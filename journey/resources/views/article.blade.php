@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col col-lg-12 mb-2 text-center">
            <h3>{{ $article->title }}</h3>
        </div>
        <div class="col col-lg-12 mb-2 text-center">
            <img src="{{ asset($article->image) }}" style="width: 300px; height: 350px; margin: auto;">
        </div>

        <div class="col col-lg-12 text-center">
            <p>{{ $article->description }}
        </div>
    </div>
@endsection