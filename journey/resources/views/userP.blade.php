@extends('layouts.app')

@section('content')
    @if(!Illuminate\Support\Facades\Auth::check())
        
    @else
        @if(Illuminate\Support\Facades\Auth::user()->role == 'Admin')
            <div class="row">
                <div class="col col-lg-3"></div>

                <div class="col col-lg-6">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <th scope="row"><a href="{{ url('viewUser', $user->id) }}">{{ $user->name }}</a></th>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center"><a href="{{ url('userD', $user->id) }}" class="btn btn-secondary">Delete</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="col col-lg-3"></div>
            </div>
        @else
            <h3>Welcome {{Illuminate\Support\Facades\Auth::user()->name}}</h3>
        @endif
    @endif
@endsection