<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{route('backhome.index')}}">
            <span class="align-middle">
                <img src="{{asset('/'.$settingweb->site_Image_dashboard)}}" alt="" style="max-height: 100%; max-width: 250px;">
            </span>
        </a>

        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Pages
            </li>

            <li class="sidebar-item {{ Request::routeIs('backhome.index') ? 'active' : ''}}">
                <a class="sidebar-link" href="{{route('backhome.index')}}">
                    <i class="align-middle" data-feather="sliders"></i>
                    <span class="align-middle">Dashboard</span>
                </a>
            </li>
            @hasanyrole('SuperAdmin|Admin')
            <li class="sidebar-item {{ Request::routeIs('pages.*') ? 'active' : ''}}">
                <a data-bs-target="#menudrop1" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layout align-middle"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="3" y1="9" x2="21" y2="9"></line><line x1="9" y1="21" x2="9" y2="9"></line></svg>
                    <span class="align-middle">Pages & Post</span>
                </a>
                <ul id="menudrop1" class="sidebar-dropdown list-unstyled collapse {{ Request::routeIs('pages.*') || Request::routeIs('posting.*') ? 'show' : ''}}" data-bs-parent="#sidebar"
                    style="">
                    <li class="sidebar-item {{ Request::routeIs('pages.*') ? 'active' : ''}}">
                        <a class="sidebar-link" href="{{route('pages.index')}}">Pages</a>
                    </li>
                    <li class="sidebar-item {{ Request::routeIs('posting.*') ? 'active' : ''}}">
                        <a class="sidebar-link" href="{{route('posting.index')}}">Posts</a>
                    </li>
                </ul>
            </li>
            @endhasanyrole
            @hasanyrole('SuperAdmin')
            <li class="sidebar-header">
                Settings
            </li>
            <li class="sidebar-item {{ Request::routeIs('kategorimenu.*') || Request::routeIs('settingswebsite.*') ? 'active' : ''}}">
                <a data-bs-target="#menudrop2" data-bs-toggle="collapse" class="sidebar-link" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings align-middle me-2"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                    <span class="align-middle">Settings Website</span>
                </a>
                <ul id="menudrop2" class="sidebar-dropdown list-unstyled collapse {{ Request::routeIs('kategorimenu.*') || Request::routeIs('settingswebsite.*') || Request::routeIs('settingsfront.*') || Request::routeIs('settingsbannerfront.*') || Request::routeIs('settingboxs.*') ? 'show' : ''}}" data-bs-parent="#sidebar"
                    style="">
                    <li class="sidebar-item {{ Request::routeIs('kategorimenu.*') ? 'active' : ''}}">
                        <a class="sidebar-link" href="{{route('kategorimenu.index')}}">Kategori Menu</a>
                    </li>
                    <li class="sidebar-item {{ Request::routeIs('settingswebsite.*') ? 'active' : ''}}">
                        <a class="sidebar-link" href="{{route('settingswebsite.index')}}">Website</a>
                    </li>
                    <li class="sidebar-item {{ Request::routeIs('settingsfront.*') ? 'active' : ''}}">
                        <a class="sidebar-link" href="{{route('settingsfront.index')}}">Font & Warna (Front)</a>
                    </li>
                    <li class="sidebar-item {{ Request::routeIs('settingsbannerfront.*') ? 'active' : ''}}">
                        <a class="sidebar-link" href="{{route('settingsbannerfront.index')}}">Banner (Front)</a>
                    </li>
                    <li class="sidebar-item {{ Request::routeIs('settingboxs.*') ? 'active' : ''}}">
                        <a class="sidebar-link" href="{{route('settingboxs.index')}}">Boxs (Front)</a>
                    </li>
                </ul>
            </li>
            @endhasanyrole
        </ul>
    </div>
</nav>
