<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">

    <meta
        content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no"
        name="viewport"
    >

    <title>Seller Login</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-social/bootstrap-social.css') }}">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">

    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

    <!-- Favicon -->
    <link
        rel="shortcut icon"
        type="image/x-icon"
        href="{{ asset('assets/img/favicon.png') }}"
    >

    <style>
        body {
            margin: 0;
            background: url('{{ asset('assets/img/login-bg.png') }}')
                center center / cover no-repeat fixed;
        }

        .login-logo {
            max-height: 55px;
            max-width: 220px;
            object-fit: contain;
        }

        .seller-title {
            text-align: center;
            margin-top: 10px;
            margin-bottom: 0;
            font-size: 18px;
            font-weight: 600;
        }
    </style>
</head>

<body>

    <div class="loader"></div>

    <div id="app">

        <section class="section">

            <div class="container mt-5">

                <div class="row">

                    <div
                        class="col-12
                        col-sm-8 offset-sm-2
                        col-md-6 offset-md-3
                        col-lg-6 offset-lg-3
                        col-xl-4 offset-xl-4"
                    >

                        <div class="card card-primary">

                            {{-- HEADER --}}
                            <div class="card-header d-block text-center">

                                <img
                                    alt="Logo"
                                    src="{{ asset('assets/img/logo.png') }}"
                                    class="login-logo"
                                >

                                <div class="seller-title">
                                    Seller Login
                                </div>

                            </div>


                            {{-- BODY --}}
                            <div class="card-body">

                                {{-- SUCCESS MESSAGE --}}
                                @if (session('success'))

                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>

                                @endif


                                {{-- GENERAL ERROR --}}
                                @if ($errors->any())

                                    <div class="alert alert-danger">
                                        {{ $errors->first() }}
                                    </div>

                                @endif


                                <form
                                    method="POST"
                                    action="{{ route('seller.login.submit') }}"
                                >

                                    @csrf


                                    {{-- EMAIL --}}
                                    <div class="form-group">

                                        <label
                                            for="email"
                                            class="control-label mb-0"
                                        >
                                            {{ __('Email Address') }}
                                        </label>

                                        <input
                                            id="email"
                                            type="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            name="email"
                                            value="{{ old('email') }}"
                                            required
                                            autocomplete="email"
                                            autofocus
                                        >

                                        @error('email')

                                            <span
                                                class="invalid-feedback"
                                                role="alert"
                                            >
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>

                                        @enderror

                                    </div>


                                    {{-- PASSWORD --}}
                                    <div class="form-group">

                                        <div
                                            class="d-flex justify-content-between align-items-center mb-2"
                                        >

                                            <label
                                                for="password"
                                                class="control-label mb-0"
                                            >
                                                {{ __('Password') }}
                                            </label>

                                            @if (Route::has('password.request'))

                                                <a
                                                    href="{{ route('password.request') }}"
                                                    class="text-small"
                                                >
                                                    Forgot Password?
                                                </a>

                                            @endif

                                        </div>


                                        <input
                                            id="password"
                                            type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            name="password"
                                            required
                                            autocomplete="current-password"
                                        >

                                        @error('password')

                                            <span
                                                class="invalid-feedback"
                                                role="alert"
                                            >
                                                <strong>
                                                    {{ $message }}
                                                </strong>
                                            </span>

                                        @enderror

                                    </div>


                                    {{-- REMEMBER ME --}}
                                    <div class="form-group">

                                        <div class="custom-control custom-checkbox">

                                            <input
                                                class="form-check-input"
                                                type="checkbox"
                                                name="remember"
                                                id="remember"
                                                value="1"
                                                {{ old('remember') ? 'checked' : '' }}
                                            >

                                            <label
                                                class="form-check-label"
                                                for="remember"
                                            >
                                                {{ __('Remember Me') }}
                                            </label>

                                        </div>

                                    </div>


                                    {{-- LOGIN BUTTON --}}
                                    <div class="form-group">

                                        <button
                                            type="submit"
                                            class="btn btn-primary btn-lg btn-block"
                                            tabindex="4"
                                        >
                                            {{ __('Seller Login') }}
                                        </button>


                                        {{-- REGISTER LINK --}}
                                        <div class="mt-4 text-muted">

                                            Don't have a seller account?

                                            <a href="{{ route('seller.register') }}">
                                                Register
                                            </a>

                                        </div>

                                    </div>
                                    <div class="form-group mt-3">
                                        <a  href="{{ route('seller.google') }}"  class="btn btn-light btn-lg btn-block border"  >
                                            <img
                                                src="https://www.gstatic.com/firebasejs/ui/2.0.0/images/auth/google.svg"
                                                alt="Google"
                                                style="width:20px; margin-right:8px;"
                                            >

                                            {{ __('Continue with Google') }}
                                        </a>
                                    </div>

                                </form>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </section>

    </div>


    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>

    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>