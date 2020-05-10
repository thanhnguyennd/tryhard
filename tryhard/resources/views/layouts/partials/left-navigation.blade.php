<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <div class="sidenav-menu-heading">Main</div>
            <a class="nav-link collapsed" href="/" >
                <div class="nav-link-icon">
                    <i class="fas fa-home"></i>
                </div>
                Home page
            </a>
            <a class="nav-link" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                <div class="nav-link-icon">
                    <i class="fas fa-columns"></i>
                </div>
                Services
                <div class="sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </a>
            <div class="collapse show" id="collapseDashboards" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <a class="nav-link" href="{{ route('user_posts.index') }}">Your posts</a>
                    <a class="nav-link" href="{{ route('user_words.index') }}">Your words
                        <span class="badge badge-primary ml-2">New!</span>
                    </a>
                </nav>
            </div>
            <div class="sidenav-menu-heading">Best of Like</div>
            <a class="nav-link collapsed" href="javascript:void(0);" >
                <div class="nav-link-icon">
                    <i class="fas fa-film"></i>
                </div>
                Movies
            </a>
            <a class="nav-link collapsed" href="javascript:void(0);" >
                <div class="nav-link-icon">
                    <i class="fas fa-paw"></i>
                </div>
                Anime
            </a>
            <a class="nav-link collapsed" href="javascript:void(0);" >
                <div class="nav-link-icon">
                    <i class="fas fa-language"></i>
                </div>
                Japanese
            </a>
            <a class="nav-link collapsed" href="javascript:void(0);" >
                <div class="nav-link-icon">
                    <i class="fas fa-book"></i>
                </div>
                Home work
            </a>
            <div class="sidenav-menu-heading">Posts</div>
            <a class="nav-link collapsed" href="javascript:void(0);" >
                <div class="nav-link-icon">
                    <i class="fas fa-history"></i>
                </div>
                History
            </a>
            <a class="nav-link collapsed" href="javascript:void(0);" >
                <div class="nav-link-icon">
                    <i class="fas fa-retweet"></i>
                </div>
                Flows
            </a>
            <div class="collapse" id="collapseFlows" data-parent="#accordionSidenav">
                <nav class="sidenav-menu-nested nav"><a class="nav-link" href="{{ route('user_posts.index') }}">Multi-Tenant Registration</a></nav>
            </div>
            <div class="sidenav-menu-heading">Account</div>
            @guest
                <a class="nav-link"href="{{ route('register') }}">
                    <div class="nav-link-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    Signup
                </a>
                <a class="nav-link"href="{{ route('login') }}">
                    <div class="nav-link-icon">
                        <i data-feather="log-in"></i>
                    </div>
                    Login
                </a>
            @else
                <a class="nav-link" href="#">
                    <div class="nav-link-icon">
                        <i data-feather="user"></i>
                    </div>
                    Profile
                </a>
                <a class="nav-link" href="#">
                    <div class="nav-link-icon">
                        <i data-feather="settings"></i>
                    </div>
                    Setting
                </a>
                <div class="dropdown-divider"></div>
                <a class="nav-link"href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <div class="nav-link-icon">
                        <i data-feather="log-out"></i>
                    </div>
                    Logout
                </a>
            @endguest
        </div>
    </div>
    <div class="sidenav-footer">
        @guest
        @else
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title">{{ Auth::user()->name }}</div>
            </div>
        @endguest
    </div>
</nav>
