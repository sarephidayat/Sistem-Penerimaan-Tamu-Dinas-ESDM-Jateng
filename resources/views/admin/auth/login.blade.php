<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Login &mdash; DINAS ESDM JAWA TENGAH</title>

    <!-- Bootstrap & Icons -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <!-- =========================
         LOGIN MODERN STYLE
    ========================== -->
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #4e73df, #6f42c1);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Inter', sans-serif;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 20px 45px rgba(0,0,0,.2);
            overflow: hidden;
        }

        .login-header {
            text-align: center;
            padding: 30px 30px 10px;
        }

        .login-header img {
            max-width: 220px;
            margin-bottom: 15px;
        }

        .login-header h4 {
            font-weight: 700;
            margin-bottom: 5px;
            color: #343a40;
        }

        .login-header p {
            font-size: 14px;
            color: #6c757d;
        }

        .login-body {
            padding: 25px 30px 30px;
        }

        .form-group label {
            font-weight: 600;
            font-size: 14px;
        }

        .form-control {
            height: 45px;
            border-radius: 10px;
        }

        .form-control:focus {
            border-color: #4e73df;
            box-shadow: 0 0 0 .2rem rgba(78,115,223,.25);
        }

        .btn-login {
            height: 45px;
            border-radius: 10px;
            font-weight: 600;
            background: linear-gradient(135deg, #4e73df, #6f42c1);
            border: none;
        }

        .btn-login:hover {
            opacity: .9;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 13px;
            color: #ffffff;
            opacity: .9;
        }

        .alert {
            border-radius: 10px;
            font-size: 14px;
        }
    </style>
</head>

<body>

<div class="login-wrapper">
    <div class="login-card">

        {{-- HEADER --}}
        <div class="login-header">
            <img src="{{ asset('img/logo.png') }}" alt="Logo">
            <h4>Login Admin</h4>
            <p>DINAS ESDM JAWA TENGAH</p>
        </div>

        {{-- BODY --}}
        <div class="login-body">
            <form method="POST" action="{{ url('/login') }}">
                @csrf

                <div class="form-group">
                    <label for="username">
                        <i class="fas fa-user mr-1"></i> Username
                    </label>
                    <input id="username"
                           type="text"
                           class="form-control"
                           name="username"
                           required
                           autofocus>
                </div>

                <div class="form-group">
                    <label for="password">
                        <i class="fas fa-lock mr-1"></i> Password
                    </label>
                    <input id="password"
                           type="password"
                           class="form-control"
                           name="password"
                           required>
                </div>

                <div class="form-group mt-4">
                    <button type="submit" class="btn btn-login btn-block text-white">
                        <i class="fas fa-sign-in-alt mr-1"></i> Login
                    </button>
                </div>
            </form>

            {{-- ERROR --}}
            @if($errors->has('login'))
                <div class="alert alert-danger mt-3">
                    {{ $errors->first('login') }}
                </div>
            @endif

            @if(isset($error))
                <div class="alert alert-danger mt-3">
                    Username atau password salah
                </div>
            @endif
        </div>
    </div>

    {{-- FOOTER --}}
    <div class="login-footer">
        DINAS ESDM JAWA TENGAH &copy; 2025
    </div>
</div>

</body>
</html>
