@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col col-lg-3 mb-3"></div>

        <div class="col col-lg-6">
            <h2 class="text-center mt-4">Create New Blog</h2>

            <form method = "POST" action = "" enctype="multipart/form-data" style="margin-top: 25px; margin-bottom: 30px; margin-left: 15px; margin-right:15px;" >
                
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="name" class="font-weight-bold">Title</label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title" value="">
                </div>

                <div class="form-group">
                    <label for="inlineFormCustomSelect" class="font-weight-bold">Category</label>
                    <select name="category" class="custom-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="image" class="font-weight-bold">Image</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>

                <div class="form-group">
                    <label for="story" class="font-weight-bold">Story</label>
                    <textarea name="story" class="form-control" id="story" placeholder="Enter Story" style="height: 300px;"></textarea>
                </div>

                <div class="text-center">
                    <button type="submit" value="submit" class="btn btn-primary text-center">Submit</button>
                </div>

                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </form>
        </div>

        <div class="col col-lg-3"></div>
    </div>
@endsection