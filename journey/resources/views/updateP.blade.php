@extends('layouts.app')            
                
@section('content')
    <div class="row">
        <div class="col col-lg-3"></div>

        <div class="col col-lg-6"> 
            <form style="margin-top: 25px; margin-bottom: 30px; margin-left: 15px; margin-right:15px;" action="updateP" method="POST" class="needs-validation">
                
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Name</label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="" value="{{Illuminate\Support\Facades\Auth::user()->name}}"> 
                </div>

                <div class="form-group">
                    <label for="address" class="font-weight-bold">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="" value="{{Illuminate\Support\Facades\Auth::user()->email}}">
                </div>

                <div class="form-group">
                    <label for="address" class="font-weight-bold">Phone</label>
                    <input type="text" name="phone" class="form-control" id="phone" placeholder="" value="{{Illuminate\Support\Facades\Auth::user()->phone}}">
                </div>

                <div class="text-center">
                    <button type="submit" value="" class="btn btn-primary text-center">Submit</button>
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