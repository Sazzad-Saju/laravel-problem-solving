<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
    {{-- <link rel="stylesheet" href="href={{asset('admin/css/register.css')}}"> --}}
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Register - Vali Admin</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    <section class="login-content" style="margin-top:70px">
      <div class="logo">
        <h1>Vali</h1>
      </div>
      <div class="login-box" style="min-height:590px; min-width:430px; margin-bottom:70px">
        <form class="login-form" action="{{route('admin.register')}}" method="POST">
            @csrf
          <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user-plus" style="margin-right: 5px"></i>REGISTER</h3>
          <div class="form-group">
            <label class="control-label">NAME</label>
            <input class="form-control" type="text" name="name" placeholder="Name" autofocus @error('name') style="border: 1px solid #ff0e0e" @enderror  value="{{old('name')}}">
            @error('name')
                <small style="color: #ff0e0e; margin-top:5px">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">EMAIL ADDRESS</label>
            <input class="form-control" type="text" name="email" placeholder="Email" autofocus @error('email') style="border: 1px solid #ff0e0e" @enderror value="{{old('email')}}">
            @error('email')
                <small style="color: #ff0e0e; margin-top:5px">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">PASSWORD</label>
            <input class="form-control" type="password" name="password" placeholder="Password" autofocus @error('name') style="border: 1px solid #ff0e0e" @enderror>
            @error('password')
                <small style="color: #ff0e0e; margin-top:5px">{{ $message }}</small>
            @enderror
          </div>
          <div class="form-group">
            <label class="control-label">CONFIRM PASSWORD</label>
            <input class="form-control" type="password" placeholder="Confirm Password" name="password_confirmation" @error('password') style="border: 1px solid #ff0e0e" @enderror>
          </div>
          <div class="form-group">
            <div class="utility">
              <div class="animated-checkbox">
                <label>
                  <input type="checkbox" name="checkbox">
                  <span class="label-text" @error('checkbox') style="color:#ff0e0e" @enderror>I agree to the <a href="">terms of service</a></span>
                </label>
              </div>
              {{-- <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p> --}}
            </div>
          </div>
          <div class="form-group btn-container">
            <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTER</button>
          </div>
          <p style="margin-top:15px;"><a href="{{route('home')}}">Already an User ? Login Here.</a></p>
        </form>
      </div>
    </section>
    <!-- Essential javascripts for application to work-->
    @include('partials.scripts')
  </body>
</html>