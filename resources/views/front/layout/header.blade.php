<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>{{ $settingweb->site_title }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link href="{{asset('img/favicon.png')}}" rel="icon">
    <link href="{{asset('img/favicon.png')}}" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  
    <link href="{{asset('css/main.css')}}" rel="stylesheet">
    <style>
      :root {
        --default-font: {{ $settingfront->default_font}};
        --heading-font: {{ $settingfront->heading_font }};
        --nav-font: {{ $settingfront->nav_font }};
      }

      :root { 
        --background-color: {{ $settingfront->background_color }};
        --default-color: {{ $settingfront->default_color }};
        --heading-color: {{ $settingfront->heading_color }};
        --main-color: {{ $settingfront->main_color }};
        --contrast-color: {{ $settingfront->contrast_color }};
      }
      :root {
        --nav-color:{{ $settingfront->nav_color }}; 
        --nav-hover-color: {{ $settingfront->nav_hover_color }};
        --nav-dropdown-background-color: {{ $settingfront->nav_dropdown_background_color }};
        --nav-dropdown-color: {{ $settingfront->nav_dropdown_color }};
        --nav-dropdown-hover-color: {{$settingfront->nav_dropdown_hover_color}};
      }
    </style>
  </head>