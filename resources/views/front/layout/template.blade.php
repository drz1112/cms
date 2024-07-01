<!DOCTYPE html>
<html lang="en">
@include('front/layout.header')
<body class="index-page">
@include('front/layout.navbar')
  <main class="main">
    @include('front/page/section.main-hero')
    @yield('content')
  </main>
  @include('front/layout.footer')
</body>
</html>