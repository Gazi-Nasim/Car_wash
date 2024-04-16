@include('layouts.header')

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="index2.html"><b>Prantik</b>SOFT</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form method="POST" action="{{ route('login') }}">
          @csrf
          <div class="input-group mb-3">
            <input type="email" name="email" value="{{old('email')}}" class="form-control" required autofocus placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                @error('email')
                <span style="color: red"><span class="fas fa-envelope"></span>{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>

          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" required autofocus placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                @error('password')
                <span style="color: red"><span class="fas fa-lock"></span>{{ $message }}</span>
                @enderror
              </div>
            </div>
          </div>
          <div class="row float-right">
            <div class=" ">
              <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  @include('layouts.footer')