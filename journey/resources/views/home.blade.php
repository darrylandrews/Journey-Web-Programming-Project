@extends('layouts.app')

@section('content')
    
    @if(!Illuminate\Support\Facades\Auth::check())
        <div class="row">
            @foreach($cat as $cat)
                @foreach($cat->article as $article)
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text text-truncate" style="max-width: 300px;">{{ $article->description }}</p>
                                <a href="{{ url('article', $article->id) }}">Read More</a>
                                <br>
                                Category: <a href="{{ url('category', $cat->id) }}">{{ $article->category->name }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    @else
        @if(Illuminate\Support\Facades\Auth::user()->role == 'Admin')
            <h3>Welcome {{Illuminate\Support\Facades\Auth::user()->name}}</h3>
        @else
            <h3>Welcome {{Illuminate\Support\Facades\Auth::user()->name}}</h3>
        @endif
    @endif
@endsection