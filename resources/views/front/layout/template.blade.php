<!DOCTYPE html>
<html lang="en">
@include('front/layout.header')
<body class="index-page">
@include('front/layout.navbar')
  <main class="main">
    @if (Route::is('FrontHome.index'))
      @include('front/page/section.main-hero')
    @endif
    @yield('content')
  </main>
  @include('front/layout.footer')
</body>
</html>