@extends('layouts.app')

@section('content')

    @if(Illuminate\Support\Facades\Auth::user()->role == 'User')
        <div class="row mb-2">
            <div class="col col-lg-3"></div>

            <div class="col col-lg-6">
                <a href="/blogC" class="btn btn-primary">Create Blog</a>
            </div>

            <div class="col col-lg-3"></div>
        </div>
    @else
    @endif
    <div class="row">
        <div class="col col-lg-3"></div>

        <div class="col col-lg-6">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col text-center" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($articles as $article)
                        <tr>
                            <th scope="row"><a href="{{ url('article', $article->id) }}">{{ $article->title }}</a></th>
                            <td class="text-center"><a href="{{ url('blogD', $article->id) }}" class="btn btn-secondary">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="col col-lg-3"></div>
    </div>
@endsection