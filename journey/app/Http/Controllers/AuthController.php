<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Category;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function loginP(){
        $categories = Category::all();
        return view('login', ['check' => "Empty"], ['categories' => $categories]);
    }

    public function login(Request $request)
    {
        // setting remember if checked or not
        $remember = $request->remember ? true : false;

        $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
        ]);

        $categories = Category::all();

        $users = User::where('email', 'like', "$request->email")
                    ->where('role', 'like', "$request->role")
                    ->first(); 
        
        // getting inputed email and password
        $credential = $request->only('email', 'password');

        if($users == [])
        {
            return view('login', ['check' => "Error"], ['categories' => $categories]);
        }
        
        if(Auth::attempt($credential, $remember))
        {   
            Cookie::queue('usercookie','',0);
            Cookie::queue('passcookie','',0);

            // if users check the remember me
            if($remember == true)
            {
                // set auto input users data
                Cookie::queue('usercookie', "$request->email", 1440);
                Cookie::queue('passcookie', "$request->password", 1440);
            }  
            
            return view('home');
            
        }
        else
        {
            return view('login', ['check' => "Error"], ['categories' => $categories]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->action([viewController::class, 'home']);
    }

    public function updateP()
    {  
        return view('updateP');
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        if($user->email == $request->email)
        {
            if($user->phone == $request->phone)
            {
                $this->validate($request,[
                    'name' => 'required|min:6',
                ]);
    
                $user->name = $request->name;
                $user->save();
            }
            else
            {
                $this->validate($request,[
                    'name' => 'required|min:6',
                    'phone' => 'required|min:10|unique:users,phone',
                ]);
    
                $user->name = $request->name;
                $user->phone = $request->phone;
                $user->save();
            }
        }
        else if($user->phone == $request->phone)
        {
            $this->validate($request,[
                'name' => 'required|min:6',
                'email'  => 'required|unique:users,email',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->save();
        }
        else
        {
            $this->validate($request,[
                'name' => 'required|min:6',
                'email'  => 'required|unique:users,email',
                'phone' => 'required|min:10|unique:users,phone',
            ]);

            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();
        }
        
        return redirect()->action([viewController::class, 'home']);
    }

    public function registerP()
    {
        $categories = Category::all();
        return view('register', ['categories' => $categories]);
    }

    public function register(Request $request)
    {
        $this->validate($request,[
            'Name' => 'required|min:3',
            'email' => 'required|unique:users,email',
            'password' => 'required|alpha_num|min:5|regex:/[a-zA-Z]/|regex:/[0-9]/',
            'PasswordConfirmation' => 'required_with:password|same:password',
            'Phone' => 'required|min:10|unique:users,phone',
        ]);
        
        DB::table('users')->insert([
            ['name' => $request->Name, 'email' => $request->email, 'phone' => $request->Phone, 'role' => 'User', 'password' => bcrypt($request->password)]
        ]); 

        $credential = $request->only('email', 'password');

        if(Auth::attempt($credential))
        {   
            return view('home');
        }
        else
        {
            return view('login', ['check' => "Error"], ['categories' => $categories]);
        }
    }
}
