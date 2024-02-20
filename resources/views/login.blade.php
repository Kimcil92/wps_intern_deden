<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="{{ Sri::hash('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css') }}"
          crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css"
          integrity="{{ Sri::hash('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}"
          crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('assets/css/deden.css')}}"
          integrity="{{ Sri::hash('assets/css/deden.css') }}"
          crossorigin="anonymous">
    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}"
          integrity="{{ Sri::hash('assets/img/favicon.png') }}"
          crossorigin="anonymous">
</head>

<body>
<div class="login-dark">
    <form method="post" id="loginForm" action="#">
        @csrf
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>

        <!-- Menampilkan pesan error -->
        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-group">
            <label>
                <input class="form-control" type="text" name="username" placeholder="Username">
            </label>
        </div>
        <div class="form-group">
            <label>
                <input class="form-control" type="password" name="password" placeholder="Password">
            </label>
        </div>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Log In</button>
        </div>

        <div class="form-group">
            <p>Username : direktur</p>
            <p>Password : password</p>
            <p>Username : manager1</p>
            <p>Password : password</p>
            <p>Username : manager2</p>
            <p>Password : password</p>
            <p>Username : staff1</p>
            <p>Password : password</p>
            <p>Username : staff2</p>
            <p>Password : password</p>
        </div>
        <a href="/" class="forgot">Back to homepage</a>
    </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
        integrity="{{ Sri::hash('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js') }}"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"
        integrity="{{ Sri::hash('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js') }}"
        crossorigin="anonymous"></script>
</body>

</html>
