<header id="header" class="header sticky-top">

    <div class="topbar d-flex align-items-center">
      <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
          <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:{{ $settingweb->site_contact_email }}">{{ $settingweb->site_contact_email }}</a></i>
          <i class="bi bi-phone d-flex align-items-center ms-4"><span>{{ $settingweb->site_contact_wa }}</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
          <a href="{{ $settingweb->site_twitter }}" class="twitter"><i class="bi bi-twitter-x"></i></a>
          <a href="{{ $settingweb->site_facebook }}" class="facebook"><i class="bi bi-facebook"></i></a>
          <a href="{{ $settingweb->site_instagram }}" class="instagram"><i class="bi bi-instagram"></i></a>
          <a href="{{ $settingweb->site_youtube }}" class="youtube"><i class="bi bi-youtube"></i></a>
        </div>
      </div>
    </div><!-- End Top Bar -->

    <div class="branding d-flex align-items-center">

      <div class="container position-relative d-flex align-items-center justify-content-between">
        <a href="{{route('FrontHome.index')}}" class="logo d-flex align-items-center">
            <img src="{{asset('/'.$settingweb->site_Image_navbar)}}" alt="" class="img img-fluid">
        </a>

        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="{{route('FrontHome.index')}}">Home</a></li>
            @foreach ($categories as $item)
              @if ($item->children)
              <li class="dropdown">
                <a href="#">{{ $item->namaKate; }}
                  @if (count($item->children) > 0)
                    @foreach ($item->children as $child)
                        @if ($child->menustatus > 0)
                          <i class="bi bi-chevron-down toggle-dropdown"></i>
                        @endif
                        @break
                    @endforeach
                  @endif
                </a>
                <ul class="{{ count($item->children)>0 ? 'wm-dropdown-menu':''}} ">
                  @if (count($item->children)>0)
                    @foreach ($item->children as $child)
                      @if ($child->menustatus == 1)
                        <li><a href="">{{ $child->namaKate }}</a></li>
                      @endif
                    @endforeach
                  @endif
                </ul>
              </li>
              @endif 
            @endforeach
            
          </ul>
          <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
        </nav>

      </div>

    </div>

  </header>