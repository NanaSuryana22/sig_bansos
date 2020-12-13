<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>UAS PABP STMIK-IM Bandung</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Nana Suryana" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->
    <!--/Style-CSS -->
    <link rel="stylesheet" href="{{ url('css_login/style_login.css') }}" type="text/css"
        media="all" />
    <!--//Style-CSS -->
</head>

<body>
    <!-- /login-section -->
    <section class="w3l-login-6">
        <div class="login-hny">
            <div class="form-content">
                <div class="form-right">
                    <div class="overlay">
                        <div class="grid-info-form">
                            <h5>Form Login</h5>
                            <h3>STMIK-IM Bandung</h3>
                            <p>Dukungan Sistem Informasi Geografis Untuk Pendataan Bantuan Sosial Di Masyarakat</p>
                        </div>
                    </div>
                </div>
                <div class="form-left">
                    <div class="middle">
                        <h4>Form Login</h4>
                        <p>Silahkan inputkan email & password anda</p>
                    </div>
                    <form action="{{ route('login') }}" method="post" class="signin-form">
                        {{ csrf_field() }}
                        <div
                            class="form-input{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email">Alamat E-Mail</label>
                            <input type="email" name="email" placeholder="Silahkan input email anda disini..."
                                id="email" required class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" autocomplete="email" autofocus />
                            @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div
                            class="form-input{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password"
                                placeholder="Masukkan password anda disini..."
                                class="form-control @error('password') is-invalid @enderror" required
                                autocomplete="current-password" />
                            @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <label class="container" for="remember">Ingat Saya
                            <input type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <span class="checkmark"></span>
                        </label>
                        <br />
                        @if(Route::has('password.request'))
                            <a class="btn btn-primary" href="{{ route('password.request') }}">
                                {{ __('Lupa Password?') }}
                            </a>
                        @endif
                        <br /><br />
                        @if(Route::has('register'))Belum punya akun ?
                            <a class="btn btn-primary" href="{{ route('register') }}">
                             Daftar disini.
                            </a>
                        @endif
                        <button type="submit" class="btn btn-primary">
                            {{ __('Login') }}
                        </button>

                    </form>
                    <div class="copy-right text-center">
                        <p>© 2020, STMIK-IM Bandung | Develop by
                            <a href="http://nanasuryana.rf.gd/" target="_blank">Nana Suryana</a></p>
                    </div>
                </div>

            </div>

        </div>
    </section>
    <!-- //login-section -->
</body>

</html>