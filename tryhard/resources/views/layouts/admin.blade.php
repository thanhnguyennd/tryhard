<!DOCTYPE html>
<html lang="en" class="no-js fontawesome-i2svg-active fontawesome-i2svg-complete">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/x-icon" href="/public/images/logo-icon.gif">
    <title>try-hard.info</title>
    <link href="/public/css/sitebar.css" rel="stylesheet">
    <link href="/public/css/admin_custom.css" rel="stylesheet">
    <link href="/public/css/custom.css" rel="stylesheet">
    <link href="/public/admin/styles.css" rel="stylesheet">
    <link href="/public/admin/dataTables.bootstrap4.min.css" rel="stylesheet" >

    <script src={{ asset("/public/admin/analytics.js") }} type="text/javascript" async="" ></script>
    <script src={{ asset("/public/admin/jquery-3.4.1.min.js") }} ></script>
    <script src={{ asset("/public//admin/bootstrap.bundle.min.js") }}></script>
    <script src={{ asset("/public/js/popper/popper.min.js") }}></script>

    <script src={{ asset("/public/js/jquery/jquery-ui.js") }}></script>
    <script src={{ asset("/public/admin/js") }} id="ga-gtag" type="text/javascript" async="" ></script>
    <script src={{ asset("/public/admin/all.min.js") }} data-search-pseudo-elements="" defer=""  ></script>
    <script src={{ asset("/public/admin/feather.min.js") }} ></script>
    <script src={{ asset("/public/admin/sass.js") }} ></script>
</head>
    <body class="nav-fixed">
    <input type="hidden" id="txtSelectText" name="">
    <a id="my-popover" href="try-hard.info" target="_blank" data-toggle="popover" title="" data-content="Some content inside the popover" data-html="true"></a>
    <div class="se-pre-con"></div>
        @include('layouts.partials.header-wapper')
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                @include('layouts.partials.left-navigation')
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
                        <div class="container-fluid">
                            <div class="page-header-content">
                                <h1 class="page-header-title">
                                    <div class="page-header-icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
                                    <span>Dashboard</span>
                                </h1>
                                <div class="page-header-subtitle">Example dashboard overview and content summary</div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid mt-n10">
                        <div class="card mb-4">
                            @yield('content')
                        </div>
                    </div>
                </main>
                <footer class="footer mt-auto footer-light">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6 small">Copyright © try-hard.info 2020</div>
                            <div class="col-md-6 text-md-right small">
                                <a href="{{ route('user_posts.index') }}">Privacy Policy</a>
                                ·
                                <a href="{{ route('user_posts.index') }}">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <a id="my-popover" href="try-hard.info" target="_blank" data-toggle="popover" title="" data-content="Some content inside the popover" data-html="true"></a>
        <script src={{ asset("/public/js/common.js") }} ></script>
        <script src={{ asset("/public/admin/scripts.js") }} ></script>
        <script src={{ asset("/public/admin/jquery.dataTables.min.js") }} ></script>
        <script src={{ asset("/public/js/home/bootstrap.min.js") }} ></script>
        <script src={{ asset("/public/admin/dataTables.bootstrap4.min.js") }} ></script>
        <script src={{ asset("/public/admin/sb-customizer.js") }}></script>

        <sb-customizer project="sb-admin-pro" _nghost-epb-c10="" ng-version="9.0.0-rc.9">

        </sb-customizer>
        <div id="sidebar" class="sbw-customizer sbw-customizer-open active">
            <button id="sidebarCollapseWords" class="sbw-customizer-toggler">
                <i class="icon icons8-microsoft-word"></i>
            </button>
            <div class="sbw-customizer-heading shadow">
                <!-- Search form -->
                <input id="boxSearch" onkeyup="words.search()" class="form-control" type="text" placeholder="Search" aria-label="Search">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onclick="words.checkPost(this)" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                        This post
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" onclick="words.markText(this)" type="checkbox" checked="checked" value="" id="defaultCheck2">
                    <label class="form-check-label" for="defaultCheck2">
                        Mark text
                    </label>
                </div>
            </div>
            <div class="sbw-customizer-content">
                <h6 class="sbw-customizer-subheading">Your words</h6>
                <ul id="listWords">
                </ul>
            </div>
        </div>
        @guest
        @else
        <div id="sideBarUser" class="sbur-customizer sbur-customizer-open active">
            <button id="sidebarCollapseUser" class="sbur-customizer-toggler">
                <i class="icon"></i>
            </button>
            <div class="sbur-customizer-heading shadow">
                <div class="user-avatar">
                    <img src="/public/images/img/img-47.jpg" alt="">
                </div>
                <div class="user-details">
                    <div class="details-name">{{ Auth::user()->name }}</div>
                    <div class="details-email">{{ Auth::user()->email }}</div>
                </div>
            </div>
            <div class="sbur-customizer-content">
                <h6 class="sbw-customizer-subheading">Your words</h6>
            </div>
        </div>
        @endguest
  </body>
</html>
