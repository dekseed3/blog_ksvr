<!DOCTYPE HTML>
<html>
    <head>
        <title>เข้าสู่ระบบ รพ.ค่ายกฤษณ์สีวะรา</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!--[if lte IE 8]><script src="assets/js/html5shiv.js"></script><![endif]-->
        <link rel="stylesheet" href="{{asset('css_login/assets/css/main.css')}}" />
        <!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
        <!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
        <noscript><link rel="stylesheet" href="{{asset('css_login/assets/css/noscript.css')}}" /></noscript>
    </head>
    <body class="is-loading">

        <!-- Wrapper -->
            <div id="wrapper">

                <!-- Main -->
                    <section id="main">
                        <header>
                            <span class=""><img style="width:150px; height:150px;  border-radius: 50%; " src="images/logo.png" alt="" /></span>
                            <h1>เข้าสู่ระบบ</h1>
                            <p>โรงพยาบาลค่ายกฤษณ์สีวะรา</p>
                        </header>

                        <hr />
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Reset Password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<footer>


   <!--<ul class="icons">
       <li><a href="#" class="fa-twitter">Twitter</a></li>
       <li><a href="#" class="fa-instagram">Instagram</a></li>
       <li><a href="#" class="fa-facebook">Facebook</a></li>
   </ul>-->
</footer>
</section>

<!-- Footer -->
<footer id="footer">
<ul class="copyright">
   <li>&copy; KSVR TEAM - All Rights Reserved</li><li> Design: <a href="#">DekseeD</a>.</li>

</ul>
</footer>

</div>

<!-- Scripts -->
<!--[if lte IE 8]><script src="assets/js/respond.min.js"></script><![endif]-->
<script>
if ('addEventListener' in window) {
window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
}
</script>

</body>
</html>
