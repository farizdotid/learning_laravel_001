@extends('app')

@section('custom-styles')
<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

    *,
    body {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        -webkit-font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
        -moz-osx-font-smoothing: grayscale;

    }

    html,
    body {
        height: 100%;
        background: linear-gradient(#EEEEEE, #FAF8F9);
        overflow: auto;
    }

    .text-gray-dark {
        color: darkgray;
    }

    .alert {
        font-size: 0.85rem;
        padding: 0.5rem 1rem;
    }

    .text-link {
        color: blue;
    }

    .text-line-clamp {
        display: -webkit-box;
        -webkit-box-orient: vertical;
        overflow: hidden;
        -webkit-line-clamp: 3;
        /* Adjust the number of lines as needed */
    }
</style>
@endsection

@section('content')
@auth
<div class="container-fluid">
    <div class="row mt-5 mt-md-5 mb-md-5">

        <div class="col-md-12">
            <div class="row">
                <div class="col-md-2">
                    <img alt="Business Logo" src="{{ Auth::user()->logo_business }}" class="rounded" width="150" height="150" />
                </div>
                <div class="col-md-10 d-flex align-items-center mb-2 mt-2">
                    <div>
                        <h2>
                            Halo, <b>{{ Auth::user()->business_name }}</b>
                        </h2>
                        <p class="text-line-clamp">
                            {{ Auth::user()->description }}
                        </p>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row mt-md-3">
    <div class="col-md-2">
            <a href="{{ route('updateprofile') }}">
                <div class="card p-3">
                    <img src="{{ asset('images/product-management-svgrepo-com.svg') }}" alt="Empty State Image" class="card-img-top mx-auto d-block" width="80" height="80">

                    <div class="mt-md-2 text-center">
                        <p>Update Profil</p>
                    </div>
                </div>
            </a>

        </div>

        <div class="col-md-2">
            <a href="{{ route('dashboarduser') }}">
                <div class="card p-3">
                    <img src="{{ asset('images/product-management-svgrepo-com.svg') }}" alt="Empty State Image" class="card-img-top mx-auto d-block" width="80" height="80">

                    <div class="mt-md-2 text-center">
                        <p>Produk Saya</p>
                    </div>
                </div>
            </a>

        </div>

        <div class="col-md-2">
            <a href="{{ route('password') }}">
                <div class="card p-3">
                    <img src="{{ asset('images/password-svgrepo-com.svg') }}" alt="Empty State Image" class="card-img-top mx-auto d-block" width="80" height="80">

                    <div class="mt-md-2 text-center">
                        <p>Ganti Password</p>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-2">
            <a href="{{ route('logout') }}">
                <div class="card p-3">
                    <img src="{{ asset('images/logout-svgrepo-com.svg') }}" alt="Empty State Image" class="card-img-top mx-auto d-block" width="80" height="80">

                    <div class="mt-md-2 text-center">
                        <p>Logout</p>
                    </div>
                </div>
            </a>

        </div>
    </div>
</div>

</div>
</div>

@endauth
@guest
<a class="btn btn-primary" href="{{ route('login') }}">Login</a>
<a class="btn btn-info" href="{{ route('register') }}">Register</a>
@endguest

@endsection