@extends('auth.layouts.main')

@section('css')
    <link rel="stylesheet" type="text/css" href="/assets/css/auth/login.css">
@endsection

@section('content')
<main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
              <div class="d-flex justify-content-center py-4">
                <span class="logo d-flex align-items-center w-auto">
                  <img src="assets/img/logo.png" alt="Logo Polstat STIS">
                  <span class="d-lg-block">SIBAU</span>
                </span>
              </div><!-- End Logo -->
              <div class="card mb-3">
                <div class="card-body">
                    <div class="pt-4 pb-2">
                        <h5 id="title-login" class="card-title text-center pb-0 fs-4">Masuk</h5>
                        <p class="text-center small">Masukkan NIP dan Password Anda</p>
                    </div>

                    <form class="row g-3 needs-validation" novalidate method="POST" action="{{ route('login') }}">
                        @csrf
                        <div id="form-input-login">
                            <div id="input-login-nip" class="form-floating">
                                <input type="text" class="form-control" id="inputNip" name="nip" autocomplete="off" placeholder="NIP" value="{{ old('nip') }}" required>
                                <label id="label-input-login" for="inputNip">NIP</label>
                            </div>
                            <div id="nip-error" class="invalid-feedback">
                            </div>
                        </div>
                        <div id="form-input-login">
                            <div class="input-group"  id="input-login-password">             
                                <div class="form-floating">
                                    <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password" value="{{ old('password') }}" required>
                                    <label id="label-input-login" for="inputPassword">Password</label>
                                </div>
                                <span class="input-group-text togglePassword">
                                    <i class="bi bi-eye-fill"></i>
                                </span>
                            </div>
                            <div id="password-error" class="invalid-feedback">
                            </div>
                        </div>

                        <div class="col-12 d-flex justify-content-between">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                                <label class="form-check-label" for="rememberMe">Ingat Saya</label>
                            </div>
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Lupa Password?</a>
                        </div>
                        <div class="col-12" id="submit-login">
                            <button class="btn btn-primary w-100" type="submit">Masuk</button>
                        </div>
                  </form> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main><!-- End #main -->
@endsection

@section('js')
    <script type="text/javascript" src="/assets/js/auth/login.js"></script>
@endsection