@extends('layouts.home')
@section('content')

	<!-- Post Outer Start -->
	<div class="row outer-wrapper clearfix" style="transform: none;">
		<!-- Post Wrapper Start -->
		<div class="fbt-col-lg-9 col-md-8 col-sm-6 post-wrapper single-post" style="transform: none;">

			<div class="clearfix">
				<div class="img-crop">
					{!! $post->iframe_syntax !!}
				</div><!-- img-crop -->
			</div>
			<div class="row" style="transform: none;">
				<!-- Post Content Start -->
				<div class="fbt-col-lg-12 col-md-12 single-post-container clearfix">
					<div class="row">
						<div class="col-md-12">
							<!-- Post Share Start -->
							<div class="post-share clearfix">
								<a href="https://www.facebook.com/Tryhard-450850188425399/" target="_blank" class="btn btn-facebook">
                                    <i class="fab fa-facebook-f"></i> Facebook
								</a>
								<a href="#" class="btn btn-github">
									<i class="fab fa-github"></i> GitHub
								</a>
								<a href="#" class="btn btn-google">
									<i class="fab fa-google"></i> Google
								</a>
								<a href="#" class="btn btn-twitter">
									<i class="fab fa-twitter"></i> Twitter
								</a>
							</div><!-- Post Share End -->

							<div class="clearfix"></div>
							<h3>{{ $post->title }}</h3>
							<div class="post-text-content clearfix">
								<span name="text">
									{!! $post->content !!}
								</span>
							</div><!-- post-text-content -->
							<!-- Comment Box Start -->
							<div class="fbt-contact-box">
								<div class="title-wrapper color-6">
									<h2><span>Leave Your Comment</span></h2>
								</div>
								<form id="comment-form">
									<div class="row">
										<div class="col-md-4">
											<label for="name">Name*</label>
											<input id="name" name="name" type="text">
										</div>
										<div class="col-md-4">
											<label for="mail">E-mail*</label>
											<input id="mail" name="mail" type="text">
										</div>
										<div class="col-md-4">
											<label for="website">Website</label>
											<input id="website" name="website" type="text">
										</div>
									</div>
									<label for="comment">Comment*</label>
									<textarea id="comment" name="comment"></textarea>
									<button type="submit" id="submit-contact">
										<i class="fa fa-comment"></i> Post Comment
									</button>
								</form>
							</div><!-- Comment Box End -->

						</div>
					</div>
				</div><!-- Post Content End -->
			</div>

		</div><!-- Post Wrapper End -->

		<!-- Post Sidebar Start -->
		<div class="fbt-col-lg-3 col-md-4 col-sm-6 post-sidebar clearfix" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
			<div class="theiaStickySidebar" style="padding-top: 0px; padding-bottom: 1px; position: static; top: 25px; left: 830.828px;">
				<!-- Sidebar Small List Start -->
				<div class="widget fbt-vc-inner clearfix">
					<div class="title-wrapper color-6">
						<h2><span>Most Popular</span></h2>
					</div>
					@foreach ($user_hot_posts as $post)
					<div class="post-item small">
						<div class="row">
							<div class="col-sm-4 col-xs-3">
								<div class="img-thumb">
									<a href="{{ route('videos',$post->id) }}"><div class="fbt-resize" style="background-image: url(/public/images/video_thumbs/{{ $post->image_thumb }})"></div></a>
								</div>
							</div>
							<div class="col-sm-8 col-xs-9 no-padding-left">
								<div class="post-content">
									<a href="{{ route('videos',$post->id) }}"><h3>{{ $post->title }}</h3></a>
									<div class="post-info clearfix">
										<span>Mar 13, 2016</span>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div><!-- Sidebar Small List End -->
			</div>
		</div><!-- Post Sidebar End -->

	</div>
	<!-- Post Outer End -->
@endsection
