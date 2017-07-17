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
                            <span class=""><img style="width:150px; height:150px;  border-radius: 50%; " src="{{ url('images/logo.png') }}" alt="" /></span>
                            <h1>ระบบจัดการข้อมูล</h1>
                            <p>โรงพยาบาลค่ายกฤษณ์สีวะรา</p>
                        </header>


                    <form class="" role="form" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                    <div class="field">
                      <label>การตั้งค่ารหัสผ่านใหม่</label>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <input id="email" type="email" class="form-control" name="email" placeholder="อีเมล์" value="{{ old('email') }}" required autofocus >

                              @include('partials._messages')

                              @if ($errors->has('email'))
                              <div class="field">
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
                                    </span>
                                    </div>
                                @endif

                            </div>
                        </div>

                        <ul class="actions">
                            <li>
                                <button type="submit" class="btn btn-primary">
                                    ส่งข้อมูล
                                </button>
                            </li>
                          </ul>

                    </form>

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
