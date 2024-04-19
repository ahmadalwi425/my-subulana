<!DOCTYPE html>
<html lang="en">
    <head>
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('asset/adminasset/plugins/images/favicon.png')}}">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Form</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                margin: 0;
            }
            .login-form {
                width: 300px;
                padding: 20px;
                background-color: #ffffff;
                border-radius: 5px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                animation: fade-in 1s ease-in-out;
            }
            .login-form h2 {
                margin-bottom: 20px;
                text-align: center;
            }
            .login-form input[type="email"], .login-form input[type="password"] {
                width: 100%;
                padding: 10px;
                margin-bottom: 10px;
                border: 1px solid #ddd;
                border-radius: 3px;
                box-sizing: border-box;
            }
            .login-form input[type="submit"] {
                background-color: #214761;
                color: #ffffff;
                padding: 10px 20px;
                border: none;
                border-radius: 3px;
                cursor: pointer;
                width: 100%;
            }
            .login-form input[type="submit"]:hover {
                background-color: #3a87c9;
            }
            @keyframes fade-in {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }
        </style>
    </head>
    <body>
        <form class="login-form" method="POST" action="{{ route('login') }}">
            
            @if (Session::has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ Session::get('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @elseif($errors->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @csrf
            <h2>My Subulana</h2>
            <input type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="E-Mail" autofocus>
            <input type="password" name="password" placeholder="Password" required autocomplete="current-password">
            <input type="submit" value="Log In">
        </form>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>