<!DOCTYPE html>
<html>
<head>
    <title>try-hard.info</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/x-icon" href="/images/logo.png">
    <!--<link href = {{ asset("/public/css/bootstrap/bootstrap.css") }} rel="stylesheet" />
    <link href = {{ asset("/public/css/bootstrap/bootstrap.min.css") }} rel="stylesheet" />-->

	<script src={{ asset("/public/js/jquery/jquery-3.4.1.min.js") }} ></script>
    <!-- Font Awesome -->
	<link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css" media="screen">

	<!-- Stylesheets -->
	<link rel="stylesheet" type="text/css" href="/public//css/home/bootstrap.min.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/public//css/home/colors.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/public//css/home/owl.carousel.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/public//css/home/owl.theme.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/public//css/home/style.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/public//css/home/classic.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/public//css/custom.css" media="screen">
	<link rel="stylesheet" type="text/css" href="/public//css/sitebar.css" media="screen">
	<style type="text/css">
        #my-popover{
            position: absolute;
        }
    </style>
</head>
<body>
	 <div class="navbar-fixed-top"></div>
	 <input type="hidden" id="txtSelectText" name="">
	<a id="my-popover" href="try-hard.info" target="_blank" data-toggle="popover" title="" data-content="Some content inside the popover" data-html="true"></a>
	<div class="container-box" style="transform: none;">
	    <div class="classic-blog2">
			<!-- Headline Start -->
			<section id="newsticker">
				<div class="headline-wrapper">
					<div class="container">
						<div class="row">
							<!-- Newsticker start -->
							<div class="col-md-2 col-sm-3 col-xs-5">
								<div class="headline-title">
									<h5>TRY-HARD.INFO</h5>
								</div>
							</div>
							<!-- Social Icons Start -->
							<div class="col-md-3 hidden-sm hidden-xs">
								<div class="fa-icon-wrap">
									<a class="facebook" href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Facebook"><i aria-hidden="true" class="fa fa-facebook"></i></a>
									<a class="google+" href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Google+"><i aria-hidden="true" class="fa fa-google-plus"></i></a>
									<a class="twitter" href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Twitter"><i aria-hidden="true" class="fa fa-twitter"></i></a>
									<a class="linkedin" href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Linkedin"><i aria-hidden="true" class="fa fa-linkedin"></i></a>
									<a class="pinterest" href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Pinterest"><i aria-hidden="true" class="fa fa-pinterest-p"></i></a>
									<a class="youtube" href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Youtube"><i aria-hidden="true" class="fa fa-youtube"></i></a>
									<a class="soundcloud" href="#" data-toggle="tooltip" data-placement="left" title="" data-original-title="Soundcloud"><i aria-hidden="true" class="fa fa-soundcloud"></i></a>
								</div>
							</div><!-- Social Icons End -->
						</div>
					</div>
				</div>
			</section><!-- Headline End -->

			<!-- Header Start -->
			<section class="header-wrapper clearfix">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-3">
							<h1 class="logo"><a href="/"><img class="img-responsive" src="/public/images/Magazine/logo.png" alt="logo"></a></h1>
						</div>
						<div class="col-md-1 hidden-sm"></div>
						<div class="col-md-8 col-sm-9">
							<div class="ad-space ads-768">
								<a href="/movies" target="_blank"><img src="/public/images/img/meg-banner-poster.jpg" alt="header-ad"></a>
							</div>
							<div class="ad-space ads-468">
								<a href="#" target="_blank"><img src="/public/images/Magazine/468x60.jpg" alt="header-ad"></a>
							</div>
						</div>
					</div>
				</div>
			</section><!-- Header End -->

			<!-- Menu Navigation Start -->
			<div class="navbar dark navbar-default megamenu clearfix">
			</div><!-- Menu Navigation End -->

			<!-- Main Content Start -->
			<section id="main-content" class="clearfix" style="transform: none;">
				<div class="container" style="transform: none;">
					<div class="row" style="transform: none;">
						<!-- Post Outer Start -->
						@yield('content')
						<!-- Post Outer End -->
					</div>
				</div>
			</section><!-- Main Content End -->
			<!-- Footer Sidebar Start -->
			<section class="footer-wrapper clearfix">
				@include('layouts.partials.footer-wrapper')
			</section>
			<!-- Footer Sidebar End -->
			<a href="#" id="BackToTop" style="bottom: -50px; display: inline-block;"><i class="fa fa-angle-up"></i></a>
		</div>
	</div>
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
				 <a href="/user/posts">
				 	<img src="/public/images/img/img-47.jpg" alt="">
				 </a>
			 </div>
			 <div class="user-details">
				 <div class="details-name">{{ Auth::user()->name }}</div>
				 <div class="details-email">{{ Auth::user()->email }}</div>
			 </div>
		 </div>
		 <div class="sbur-customizer-content">
		 </div>
	 </div>
	 @endguest
	<div class="navbar-fixed-bottom"></div>
     <script src={{ asset("/public/admin/bootstrap.bundle.min.js") }}></script>
     <script src={{ asset("/public/js/popper/popper.min.js") }}></script>
     <script src={{ asset("/public/js/common.js") }} ></script>
     <script src={{ asset("/public/js/home/bootstrap.min.js") }} ></script>
     {{--	<script src={{ asset("/public/js/bootstrap/bootstrap.min.js") }} ></script>--}}
     <script src={{ asset("/public/admin/sb-customizer.js") }}></script>
{{--	<script type="text/javascript" src="/public//js/home/owl.carousel.min.js"></script>--}}
{{--	<script type="text/javascript" src="/public//js/home/cycle.all.js"></script>--}}
{{--	<script type="text/javascript" src="/public//js/home/resizesensor.min.js"></script>--}}
{{--	<script type="text/javascript" src="/public//js/home/theia-sticky-sidebar.js"></script>--}}
{{--	<script type="text/javascript" src="/public//js/home/main.js"></script>--}}
</body>
</html>
