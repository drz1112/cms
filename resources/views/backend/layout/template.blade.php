<!DOCTYPE html>
<html lang="en">
@include('backend/layout.header')
<body>
    <div class="wrapper">
        @include('backend/layout.sidebar')
        <div class="main">
            @include('backend/layout.alert')
            @include('backend/layout.navbar')    
            <main class="content">
                @yield('content')
            </main>
            @include('backend/layout.footer-copyright')
        </div>
    </div>
    @include('backend/layout.footer-js')
</body>

</html>