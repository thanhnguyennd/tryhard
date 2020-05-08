<!DOCTYPE html>
<html lang="en" class="no-js fontawesome-i2svg-active fontawesome-i2svg-complete">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<script type="text/javascript" async="" src="/public//admin/analytics.js"></script>
	<script id="ga-gtag" type="text/javascript" async="" src="/public//admin/js"></script>
	<script src={{ asset("/public//admin/jquery-3.4.1.min.js") }} ></script>
	<script src={{ asset("/public//admin/bootstrap.bundle.min.js") }}></script>
	<script src={{ asset("/public/js/popper/popper.min.js") }}></script>
	<script src={{ asset("/public/js/jquery/jquery-ui.js") }}></script>

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" type="image/x-icon" href="/public/images/logo-icon.gif">
	<title>try-hard.info</title>
	<style type="text/css">
		#my-popover{
			position: absolute;
		}
	</style>
	<link href="/public/css/sitebar.css" rel="stylesheet">
	<link href="/public/css/admin_custom.css" rel="stylesheet">
	<link href="/public/css/custom.css" rel="stylesheet">
	<link href="/public/admin/styles.css" rel="stylesheet">
	<link href="/public/admin/dataTables.bootstrap4.min.css" rel="stylesheet" >
	<script data-search-pseudo-elements="" defer="" src="/public/admin/all.min.js" ></script>
	<script src="/public/admin/feather.min.js" ></script>
	<style>
		.btn-customizer[_ngcontent-epb-c10]
		{
			display:-webkit-box;display:flex;width:100%;-webkit-box-pack:justify;justify-content:space-between;-webkit-box-align:center;align-items:center;border-radius:.35rem;font-size:.85rem;padding:1rem;outline:0;margin-bottom:.5rem
		}
		.btn-customizer[_ngcontent-epb-c10]   svg[_ngcontent-epb-c10]{visibility:hidden}
		.btn-customizer[_ngcontent-epb-c10]:focus{font-weight:700;box-shadow:0 0 0 .125rem #d7dce3}
		.btn-customizer[_ngcontent-epb-c10]:focus   svg[_ngcontent-epb-c10]{visibility:visible}
		.sb-customizer-btn-export[_ngcontent-epb-c10]{font-size:.85rem;padding:1rem}
		.sb-customizer-btn-export[_ngcontent-epb-c10]   .ng-fa-icon[_ngcontent-epb-c10]{margin-right:.25rem}
		.sb-customizer[_ngcontent-epb-c10]
		{z-index:9999;position:fixed;top:0;width:20rem;height:100vh;text-align:left;background:#fff;-webkit-transition:right .5s;transition:right .5s;box-shadow:-.15rem 0 1.75rem 0 rgba(34,39,46,.15)}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-heading[_ngcontent-epb-c10]
		{padding:1.5rem;font-size:.7rem;font-weight:800;text-transform:uppercase;letter-spacing:.05em;color:#a7aeb8}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-subheading[_ngcontent-epb-c10]{font-size:.8rem;font-style:italic;color:#6c737d;margin-bottom:.75rem}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-toggler[_ngcontent-epb-c10]
		{position:absolute;top:4.625rem;display:-webkit-box;display:flex;-webkit-box-align:center;align-items:center;-webkit-box-pack:center;justify-content:center;left:-3rem;width:3rem;height:3rem;border:0;box-shadow:0 .15rem 1.75rem 0 rgba(34,39,46,.15);color:#001500;background-color:#fff;border-radius:.35rem 0 0 .35rem}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-toggler[_ngcontent-epb-c10]:focus{outline:0}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-content[_ngcontent-epb-c10]{position:relative;height:calc(100% - 64px);overflow-y:auto;padding:1.5rem}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-content[_ngcontent-epb-c10]::-webkit-scrollbar{display:block;width:.5rem}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-content[_ngcontent-epb-c10]::-webkit-scrollbar-thumb{background-color:#c7cdd6;border-radius:10rem;height:3em;background-clip:padding-box;border:.1rem solid transparent}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-content[_ngcontent-epb-c10]::-webkit-scrollbar-track{background-color:rgba(34,39,46,.05)}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-content[_ngcontent-epb-c10]::-webkit-scrollbar-button{width:0;height:0;display:none}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-content[_ngcontent-epb-c10]::-webkit-scrollbar-corner{background-color:transparent}
		.sb-customizer[_ngcontent-epb-c10]   .sb-customizer-content[_ngcontent-epb-c10]:hover::-webkit-scrollbar{display:block}.sb-customizer.sb-customizer-closed[_ngcontent-epb-c10]{right:-20rem}.sb-customizer.sb-customizer-open[_ngcontent-epb-c10]{right:0}
		.swatch[_ngcontent-epb-c10]{border:0}
		#swatch1[_ngcontent-epb-c10]   .swatch[_ngcontent-epb-c10]{color:#fff;background-color:#0061f2;background-image:linear-gradient(45deg,#0061f2,#6900c7)}
		#swatch2[_ngcontent-epb-c10]   .swatch[_ngcontent-epb-c10]{color:#fff;background-color:#1da1f5;background-image:linear-gradient(45deg,#1da1f5,#8039da)}
		#swatch3[_ngcontent-epb-c10]   .swatch[_ngcontent-epb-c10]{color:#fff;background-color:#f53b57;background-image:linear-gradient(45deg,#f53b57,#ff793f)}
		#swatch4[_ngcontent-epb-c10]   .swatch[_ngcontent-epb-c10]{color:#fff;background-color:#6eabc2;background-image:linear-gradient(45deg,#6eabc2,#506c6a)}
		#swatch5[_ngcontent-epb-c10]   .swatch[_ngcontent-epb-c10]{color:#fff;background-color:#06794f;background-image:linear-gradient(45deg,#06794f,#0fa28b)
		}
	</style>
	<script src={{ asset("/public/admin/sass.js") }}></script>
</head>
<body class="nav-fixed">
	<!-- Paste this code after body tag -->
	<div class="se-pre-con"></div>
	<!-- Ends -->
	@include('layouts.partials.header-wapper')
	<div id="layoutSidenav">
		<div id="layoutSidenav_nav">
			@include('layouts.partials.left-navigation')
		</div>
		<div id="layoutSidenav_content">
			<div class="container-fluid main">
				@yield('content')

			</div>
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
{{--	<script src={{ asset("/js/bootstrap/bootstrap.min.js") }} ></script>--}}
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