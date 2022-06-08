@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col col-lg-3"></div>

        <div class="col col-lg-6">
            <h2 class="text-center mt-4">Register</h2>

            <form style="margin-top: 25px; margin-bottom: 30px; margin-left: 15px; margin-right:15px;" action="" method="POST" class="needs-validation">
                
                {{ csrf_field() }}
                
                <div class="form-group">
                    <label for="name" class="font-weight-bold">Name</label>
                    <input type="text" name="Name" class="form-control" id="name" placeholder="Enter name">
                </div>

                <div class="form-group">
                    <label for="email" class="font-weight-bold">Email Address</label>
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                
                <div class="form-group">
                    <label for="password" class="font-weight-bold">Password</label>
                    <input type="password" name="password" class="form-control " id="password" placeholder="Enter password">
                </div>

                <div class="form-group">
                    <label for="passconf" class="font-weight-bold">Confirm Password</label>
                    <input type="password" name="PasswordConfirmation" class="form-control " id="passconf" placeholder="Re-enter password">
                </div>

                <div class="form-group">
                    <label for="phone" class="font-weight-bold">Phone</label>
                    <input type="text" name="Phone" class="form-control" id="phone" placeholder="Enter phone">
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