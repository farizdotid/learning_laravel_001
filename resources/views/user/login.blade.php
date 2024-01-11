@extends('app')

@section('custom-styles')
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700;900&display=swap');

  body {
    font-family: 'Poppins', sans-serif;
    font-weight: 400;
    -webkit-font-smoothing: antialiased;
    text-rendering: optimizeLegibility;
    -moz-osx-font-smoothing: grayscale;
    background: linear-gradient(#EEEEEE, #FAF8F9);
    width: 100%;
    height: 100%;
    background-attachment: fixed;
    padding: 20px;
  }

  .text-gray-dark {
    color: darkgray;
  }

  .alert {
    font-size: 0.85rem; 
    padding: 0.5rem 1rem;
  }
</style>
@endsection

@section('content')
<div class="row">
  <div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-sm-9 col-md-7 col-lg-5">
      <div class="card border-0 shadow rounded-5 my-5">
        <div class="card-body p-4 p-sm-5">
          <img src="{{ asset('images/creative-hub.png') }}" alt="Logo Purwakarta Creative Hub" class="img-fluid mb-5">
          <form action="{{ route('login.action') }}" method="POST">
            @csrf
            <div class="form-floating mb-3">
              <input type="email" class="form-control" id="floatingInput" placeholder="sample@gmail.com" value="{{ old('email') }}" name="email">
              <label for="floatingInput">Email</label>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password">
              <label for="floatingPassword">Password</label>
            </div>

            <div class="d-grid">
              <button class="btn btn-custom-primary btn-login text-uppercase fw-bold" type="submit">Login</button>
            </div>
          </form>

          @if(session('success'))
          <p class="alert alert-success mb-2 mt-2">{{ session('success') }}</p>
          @endif
          @if($errors->any())
          @foreach($errors->all() as $err)
          <p class="alert alert-danger mb-2 mt-2">{{ $err }}</p>
          @endforeach
          @endif
        </div>
      </div>

      <!-- New section for text above the card -->
      <div class="col-sm-9 col-md-7 col-lg-5">
        <a href="{{ route('home') }}" class="text-center text-gray-dark">← Kembali ke Home</a>
      </div>
    </div>
  </div>

</div>
@endsection