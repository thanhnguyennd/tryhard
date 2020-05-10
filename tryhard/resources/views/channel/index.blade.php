@extends('layouts.admin')
@section('content')
    <div class="form-data-posts container">
        <h3>Result</h3>
    @foreach ($posts as $post)
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-3 fbt-vc-inner post-grid clearfix">
                <div class="post-item clearfix">
                    <div class="img-thumb">
                        <a href="{{ route('videos',$post->id) }}">
                            <div class="fbt-resize" style="background-image: url(/public/images/video_thumbs/{{ $post->image_thumb }})">
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-9 col-sm-6 col-xs-9 fbt-vc-inner post-grid clearfix">
                <div class="post-content">
                    <a href="{{ route('videos',$post->id) }}">
                        <h3>{{ $post->title }}</h3>
                    </a>
                    <div class="post-info clearfix">
                        <span><a href="{{ route('channel',$post->user_id) }}">{{ $post->user_name }}</a></span>
                        <span>-</span>
                        <span>{{ $post->created_date }}</span>
                        <span>-</span>
                        <span class="rating">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <i class="far fa-star"></i>
                            </span>
                    </div>
                    <span name="content">{!! $post->content_sub_text !!}</span>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div class="row form-loadding">
    </div>
@endsection

