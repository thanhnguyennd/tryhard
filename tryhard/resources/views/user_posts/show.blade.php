@extends('layouts.admin')

@section('content')
<div class="card-body">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Posts</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('user_posts.index') }}"> Back</a>
            </div>
            <img style="position: absolute; right: 0; top: 0" height="180" width="150" src="/public/images/video_thumbs/{{ $user_post->image_thumb  }}">
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {{ $user_post->title }}
            </div>
            
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Content:</strong>
                <span name="text">
                {!! $user_post->content !!}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection