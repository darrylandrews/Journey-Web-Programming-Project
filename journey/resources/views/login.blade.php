@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col col-lg-3"></div>

        <div class="col col-lg-6">
            <form method = "POST" action = "" style="margin-top: 25px; margin-bottom: 30px; margin-left: 15px; margin-right:15px;" >
                                
                {{ csrf_field() }}
                <div class="form-group mb-4">
                    <label for="inlineFormCustomSelect" class="font-weight-bold">Product Type</label>
                    <select name="role" class="custom-select">
                        <option value="User" selected>User</option>
                        <option value="Admin">Admin</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email Address</label>
                    <input type="email" value="{{\Illuminate\Support\Facades\Cookie::get('usercookie')}}" name="email" class="form-control border-secondary" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>

                <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input type="password" value="{{\Illuminate\Support\Facades\Cookie::get('passcookie')}}" name="password" class="form-control border-secondary" id="password" placeholder="Password">
                </div>

                <div class="form-check form-control-sm" style="margin-top: -15px; margin-bottom: 10px;">
                    @if(\Illuminate\Support\Facades\Cookie::get('usercookie'))
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" checked>
                    @else
                        <input type="checkbox" class="form-check-input" name="remember" id="remember">
                    @endif
                    <label class="form-check-label" for="remember">Remember me</label>
                </div>

                <div class="text-center mb-3">
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
                
                @if($check == 'Empty')

                @else
                    @if($check == 'Error')
                        <div class="alert alert-danger">
                            <ul>
                                <li>Incorrect Email or Password</li>
                            </ul>
                        </div>
                    @endif
                @endif
            </form>
        </div>

        <div class="col col-lg-3"></div>
    </div>
@endsection