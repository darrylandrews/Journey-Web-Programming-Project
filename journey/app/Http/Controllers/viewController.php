<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class viewController extends Controller
{
    public function home()
    {
        $categories = Category::all();
        $cat = Category::all();

        return view('home', ['categories' => $categories], ['cat' => $cat]);
    }

    public function category(Request $request)
    {
        $categories = Category::all();
        $cat = Category::where('id', 'like', "$request->id")
                    ->get();

        return view('home', ['categories' => $categories], ['cat' => $cat]);
    }

    public function article(Request $request)
    {
        $categories = Category::all();
        $article = Article::where('id', 'like', "$request->id")
                    ->first();

        return view('article', ['categories' => $categories], ['article' => $article]);
    }

    public function userP()
    {
        $users = User::where('role', 'like', 'User')
                    ->get();

        return view('userP', ['users' => $users]);
    }

    public function userD(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();    
        return redirect()->action([viewController::class, 'userP']);
    }

    public function blog()
    {
        $userid = Auth::user()->id;

        $articles = Article::where('user_id', 'like', "$userid")
                    ->get();

        return view('blog', ['articles' => $articles]);
    }

    public function viewU(Request $request)
    {
        $userid = $request->id;

        $articles = Article::where('user_id', 'like', "$userid")
                    ->get();

        return view('blog', ['articles' => $articles]);
    }

    public function blogD(Request $request)
    {
        $article = Article::find($request->id);
        $article->delete();    
        return redirect()->action([viewController::class, 'blog']);
    }

    public function blogC(Request $request)
    {
        $categories = Category::all();
        return view('createB', ['categories' => $categories]);
    }

    public function blogCreate(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|min:5',
            'category' => 'exists:categories,id',
            'image' => 'nullable|mimes:jpeg,gif,png,jpg',
            'story' => 'required|min:15',
        ]);

        $userid = Auth::user()->id;
        
        $img = $request['image'];
        $f_name = $img->getClientOriginalName();
        
        DB::table('articles')->insert([
            ['user_id' => $userid, 'category_id' => $request->category, 'title' => $request->title, 'description' => $request->story, 'image' => "images/".$f_name],
        ]);

        $img->move('images', $f_name);

        return redirect()->action([viewController::class, 'blog']);
    }
}
