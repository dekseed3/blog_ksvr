<!DOCTYPE HTML>
<html lang="en">
  <head>

  @include('partials._head')

  @yield('stylesheets')

  </head>

  <body>

      @include('partials._navbar')

        <div class="container">

          @include('partials._messages')

          @yield('content')

            @include('partials._footer')

        </div> <!-- end of .container -->

      @include('partials._scripts')
      @yield('scripts')
  </body>
</html>
