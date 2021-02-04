<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in (v2)</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->

  <link rel="stylesheet" href={{asset('admin/plugins/fontawesome-free/css/all.min.css')}}>
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href={{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}>
  <!-- Theme style -->
  <link rel="stylesheet" href={{asset('admin/dist/css/adminlte.min.css')}}>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>{{config('app.name')}}</b> LTE</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <form  method="POST" action="{{ route('login') }}">
        @csrf
        <div class="input-group mb-3">
          <input  class="form-control @error('email') is-invalid @enderror"  placeholder="Email" id="email"  type="email" name="email" :value="old('email')" required autofocus>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>

        </div>
        <div class="input-group mb-3">
          <input class="form-control @error('password') is-invalid @enderror" placeholder="Password" type="password"
          name="password"
          required autocomplete="current-password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input id="remember_me" type="checkbox" name="remember">
              <label for="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </form>



      <p class="mb-1">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Forgot your password?') }}
            </a>
        @endif
      </p>
      <p class="mb-0">
        <a href="{{ route('register') }}" class="text-center">Register a new membership</a>
      </p>
      <div class="m-3">
        @error('email')
        <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          @error('password')
                  <div class="alert alert-danger">{{ $message }}</div>
        @enderror

      </div>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src={{asset('admin/plugins/jquery/jquery.min.js')}}></script>
<!-- Bootstrap 4 -->
<script src={{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}></script>
<!-- AdminLTE App -->
<script src={{asset('admin/dist/js/adminlte.min.js')}}></script>
</body>
</html>
