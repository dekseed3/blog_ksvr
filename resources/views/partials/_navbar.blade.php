@if (Auth::guard('admin')->check() && Auth::guard('web')->check())
<!-- Default navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ url('/home') }}">ระบบจัดการข้อมูล รพ.ค่ายกฤษณ์สีวะรา</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">

            <li class="{{ Request::is('home') ? "active" : "" }}"><a href="{{ url('/home') }}">หน้าแรก<span class="sr-only">(current)</span></a></li>
            <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="{{ url('/blog') }}">Blog<span class="sr-only">(current)</span></a></li>
            <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{ url('/contact') }}">ติดต่อเรา</a></li>
            <li class="{{ Request::is('how_to_use') ? "active" : "" }}"><a href="{{ url('/how_to_use') }}">วิธีใช้งาน</a></li>

      </ul>
          <!-- <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="ค้นหา">
            </div>
            <button type="submit" class="btn btn-default">ค้นหา</button>
          </form> -->
          <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#">Link</a></li> -->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">สวัสดี {{ Auth::user()->name }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            @if (Auth::guard('admin')->check())
            <li class="{{ Request::is('admin') ? "active" : "" }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="{{ Request::is('posts') ? "active" : "" }}"><a href="{{ route('posts.index') }}">Post</a></li>
            <li class="{{ Request::is('categories') ? "active" : "" }}"><a href="{{ route('categories.index') }}">หมวดหมู่</a></li>
            <li class="{{ Request::is('tags') ? "active" : "" }}"><a href="{{ route('tags.index') }}">Tag</a></li>
            <li class="{{ Request::is('register') ? "active" : "" }}"><a href="{{ route('register') }}">เพิ่มข้อมูลกำลังพล</a></li>


            @else

              <li><a href="#">test2</a></li>

            @endif

              <li role="separator" class="divider"></li>

                @if (Auth::guard('admin')->check() && Auth::guard('web')->check())

                  <li><a href="{{ route('admin.logout') }}">ออกจากระบบ ADMIN</a></li>
                  <li><a href="{{ route('user.logout') }}">ออกจากระบบ USER</a></li>

                @elseif (Auth::guard('admin')->check())

                  <li><a href="{{ route('admin.logout') }}">ออกจากระบบ ADMIN</a></li>

                @else

                  <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                  </form></li>

                @endif



          </ul>
        </li>
      </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
      @elseif (Auth::guard('web')->check())
    <!-- Default navbar -->
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ url('/home') }}">ระบบจัดการข้อมูล รพ.ค่ายกฤษณ์สีวะรา</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">

                <li class="{{ Request::is('home') ? "active" : "" }}"><a href="{{ url('/home') }}">หน้าแรก<span class="sr-only">(current)</span></a></li>
                <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="{{ url('/blog') }}">Blog<span class="sr-only">(current)</span></a></li>
                <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{ url('/contact') }}">ติดต่อเรา</a></li>
                <li class="{{ Request::is('how_to_use') ? "active" : "" }}"><a href="{{ url('/how_to_use') }}">วิธีใช้งาน</a></li>

          </ul>

              <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">สวัสดี {{ Auth::user()->name }} <span class="caret"></span></a>
              <ul class="dropdown-menu">

                  <li><a href="#">test2</a></li>

                  <li role="separator" class="divider"></li>

                      <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                      </form></li>
              </ul>
            </li>
          </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        @else
          <!-- Default navbar -->
              <nav class="navbar navbar-default navbar-fixed-top">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/home') }}">ระบบจัดการข้อมูล รพ.ค่ายกฤษณ์สีวะรา</a>
                  </div>

                  <!-- Collect the nav links, forms, and other content for toggling -->
                  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                      <li class="{{ Request::is('home') ? "active" : "" }}"><a href="{{ url('/home') }}">หน้าแรก<span class="sr-only">(current)</span></a></li>
                      {{-- <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="{{ url('/blog') }}">Blog<span class="sr-only">(current)</span></a></li>
                      <li class="{{ Request::is('contact') ? "active" : "" }}"><a href="{{ url('/contact') }}">ติดต่อเรา</a></li>
                      <li class="{{ Request::is('how_to_use') ? "active" : "" }}"><a href="{{ url('/how_to_use') }}">วิธีใช้งาน</a></li>
       --}}
                </ul>
                    <!-- <form class="navbar-form navbar-left">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="ค้นหา">
                      </div>
                      <button type="submit" class="btn btn-default">ค้นหา</button>
                    </form> -->
                    <ul class="nav navbar-nav navbar-right">
                  <!-- <li><a href="#">Link</a></li> -->
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">สวัสดี {{ Auth::user()->name }} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      @if (Auth::guard('admin')->check())
                      <li class="{{ Request::is('admin') ? "active" : "" }}"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                      <li class="{{ Request::is('posts') ? "active" : "" }}"><a href="{{ route('posts.index') }}">Post</a></li>
                      <li class="{{ Request::is('categories') ? "active" : "" }}"><a href="{{ route('categories.index') }}">หมวดหมู่</a></li>
                      <li class="{{ Request::is('tags') ? "active" : "" }}"><a href="{{ route('tags.index') }}">Tag</a></li>
                      <li class="{{ Request::is('register') ? "active" : "" }}"><a href="{{ route('register') }}">เพิ่มข้อมูลกำลังพล</a></li>


                      @else

                        <li><a href="#">test2</a></li>

                      @endif

                        <li role="separator" class="divider"></li>

                          @if (Auth::guard('admin')->check() && Auth::guard('web')->check())

                            <li><a href="{{ route('admin.logout') }}">ออกจากระบบ ADMIN</a></li>
                            <li><a href="{{ route('user.logout') }}">ออกจากระบบ USER</a></li>

                          @elseif (Auth::guard('admin')->check())

                            <li><a href="{{ route('admin.logout') }}">ออกจากระบบ ADMIN</a></li>

                          @else

                            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}
                            </form></li>

                          @endif



                    </ul>
                  </li>
                </ul>
                  </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
              </nav>

        @endif
