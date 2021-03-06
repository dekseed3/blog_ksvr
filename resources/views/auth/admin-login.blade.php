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
                            <h1>เข้าสู่ระบบ ADMIN</h1>
                            <p>โรงพยาบาลค่ายกฤษณ์สีวะรา</p>
                        </header>

                        <hr />
                        <!-- <h2>Extra Stuff!</h2> -->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                      {{ csrf_field() }}
                         <div class="field{{ $errors->has('email') ? ' has-error' : '' }}">

                                 <input id="email" type="email" class="form-control" name="email" placeholder="อีเมล์" value="{{ old('email') }}" required autofocus >
                                 @if ($errors->has('email'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('email') }}</strong>
                                     </span>
                                 @endif

                         </div>

                         <div class="field{{ $errors->has('password') ? ' has-error' : '' }}">

                                 <input id="password" type="password" class="form-control" placeholder="รหัสผ่าน" name="password" required>
                             @if ($errors->has('password'))
                                 <span class="help-block">
                                     <strong>{{ $errors->first('password') }}</strong>
                                 </span>
                             @endif

                         </div>


                         <!-- <div class="field">
                             <div class="select-wrapper">
                                 <select name="department" id="department">
                                     <option value="">Department</option>
                                     <option value="sales">Sales</option>
                                     <option value="tech">Tech Support</option>
                                     <option value="null">/dev/null</option>
                                 </select>
                             </div>
                         </div>
                         <div class="field">
                             <textarea name="message" id="message" placeholder="Message" rows="4"></textarea>
                         </div>

                         <div class="field">
                             <label>But are you a robot?</label>
                             <input type="radio" id="robot_yes" name="robot" /><label for="robot_yes">Yes</label>
                             <input type="radio" id="robot_no" name="robot" /><label for="robot_no">No</label>
                         </div>-->
                         <ul class="actions">
                             <li><!-- <a href="#" class="button">ล็อกอิน</a> -->
                                 <input type="submit" value="ล็อกอิน" class="button" /></li>
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
         <script src="{{ asset('js/bootstrap.min.js') }}"></script>
         <script>
             if ('addEventListener' in window) {
                 window.addEventListener('load', function() { document.body.className = document.body.className.replace(/\bis-loading\b/, ''); });
                 document.body.className += (navigator.userAgent.match(/(MSIE|rv:11\.0)/) ? ' is-ie' : '');
             }
         </script>

 </body>
</html>
