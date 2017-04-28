<!DOCTYPE html>
<html lang="en">
<head>
@include('partials._head')
</head>

  <body>

    @include('partials._nav')    


      <div class="container" style="min-height: 565px;">

          @include('partials._messages')

          @yield('content')
          

      </div>
      @include('partials._footer')
    @include('partials._javascript')
    @yield('scripts')

  </body>
  </html>