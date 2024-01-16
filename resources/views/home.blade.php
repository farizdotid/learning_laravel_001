@extends('app')
@section('content')
@auth
<p>Welcome <b>{{ Auth::user()->email }}</b></p>
<a class="btn btn-primary" href="{{ route('password') }}">Change Password</a>
<a class="btn btn-primary" href="{{ route('createproduct') }}">Create Product</a>
<a class="btn btn-primary" href="{{ route('dashboarduser') }}">Dashboard User</a>
<a class="btn btn-danger" href="{{ route('logout') }}">Logout</a>


@endauth
@guest
<a class="btn btn-primary" href="{{ route('login') }}">Login</a>
<a class="btn btn-info" href="{{ route('register') }}">Register</a>
@endguest

@endsection