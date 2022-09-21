@extends('layouts.main')

@section('content')
<section class="py-6 pb-9 bg-default">
<div class="p-3 mb-3 bg-secondary text-white">
   <div class="row justify-content-center text-center">
     <div class="col-md-6">
       <p class="display-4 text-black">Sistem Informasi Pengelolaan Rumah Sakit</p>
         <p class="lead text-mint">
           Healties 2022
         </p>
       </div>
     </div>
  </section>
<div class="auth-wrapper d-flex no-block justify-content-center align-items-center position-relative"
  style="background:url({{ asset('assets/images/big/auth-bg.jpg') }}) no-repeat center center;">
  <div class="auth-box row">
    <div class="col-lg-7 col-md-5 modal-bg-img" style="background-image: url({{ asset('assets/images/bg.jpg') }});">
    </div>
    <div class="col-lg-5 col-md-7 bg-white">
      <div class="p-3">
        <div class="text-center">
          <img src="{{ asset('assets/images/big/icon.png') }}" alt="wrapkit">
        </div>
        <h2 class="mt-3 text-center">Sign In</h2>
        <p class="text-center">Enter your email address and password</p>
        <form class="mt-4" method="POST" action="{{ route('login') }}">
          @csrf
          <div class="row">
            <div class="col-lg-12">
              <div class="form-group">
                <label class="text-dark" for="uname">Email</label>
                <input class="form-control @error('email') is-invalid @enderror" id="uname" name="email" type="email"
                  placeholder="enter your email" value="{{ old('email') }}">
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-12">
              <div class="form-group">
                <label class="text-dark" for="pwd">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" id="pwd" name="password" type="password"
                  placeholder="enter your password">
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="col-lg-12 text-center">
              <button type="submit" class="btn btn-block btn-dark">Sign In</button>
            </div>
            <div class="col-lg-12 text-center mt-5">
              {{-- Don't have an account? <a href="#" class="text-danger">Sign Up</a> --}}
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
  <div class="col-md-12">
    <div class="credits text-center">
      <div class="p-3 mb-3 bg-secondary text-white">
        &copy; 2022 Putri & Izza
      </div>
    </div>
  </div>
@endsection

