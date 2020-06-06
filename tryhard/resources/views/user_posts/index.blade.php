@extends('layouts.admin')

@section('content')

    <div class="card-header">Your posts</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="dataTables_length" id="dataTable_length">
                  <a class="btn btn-sm btn-primary" href="/user/posts/create" role="button">New Post</a>
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div id="dataTable_filter" class="dataTables_filter">
                  <label>Search:
                    <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                  </label>
                </div>
              </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered table-hover dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                <thead>
                    <tr role="row">
                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort-up" class="svg-inline--fa fa-sort-up fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z"></path></svg>
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Title: activate to sort column ascending" style="width: 165px;">Title<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 42px;">Status<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Create date: activate to sort column ascending" style="width: 72px;">Create date<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 51px;">Actions<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                        </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr><th rowspan="1" colspan="1">No</th>
                        <th rowspan="1" colspan="1">Title</th>
                        <th rowspan="1" colspan="1">Status</th>
                        <th rowspan="1" colspan="1">Create date</th>
                        <th rowspan="1" colspan="1">Actions</th></tr>
                </tfoot>
                <tbody>
                    @foreach ($user_posts as $post)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{ ++$i }}</td>
                        <td>
                            <a href="{{ route('user_posts.show',UrlId::encrypt($post->id,Config::get('constants.posts'))) }} }}">
                                @if(strlen($post->image_thumb) > 0)
                                    <img style="height: 50px;width: 50px" src="/public/images/video_thumbs/{{ $post->image_thumb }}">
                                    /public
                                @else
                                    <img style="height: 50px;width: 50px" src="/public/images/video_thumbs/default.jpg">
                                @endif

                            </a>
                            {{ $post->title }}
                        </td>
                        @if($post->is_publish == 1)
                            <td><div class="badge badge-primary badge-pill">Public</div></td>
                        @else
                            <td><div class="badge badge-warning badge-pill">Private</div></td>
                        @endif
                        <td>{{ $post->created_at }}</td>
                        <td>
                            <form style="display: -webkit-inline-box;" action="{{ route('user_posts.destroy',UrlId::encrypt($post->id,Config::get('constants.posts'))) }} }}" method="POST">
                                <a href="{{ route('user_posts.edit',UrlId::encrypt($post->id,Config::get('constants.posts'))) }} }}" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle>
                                    </svg>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-datatable btn-icon btn-transparent-dark">
                                    <i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                            <form style="display: -webkit-inline-box;" action="{{ route('user_posts.publish',UrlId::encrypt($post->id,Config::get('constants.posts'))) }} }}" method="POST">
                                @csrf
                                <button class="btn btn-datatable btn-icon btn-transparent-dark">
                                    @if($post->is_publish == 0)
                                        <input type="hidden" name="is_publish" value="1">
                                        <i class="fas fa-share-alt"></i>
                                    @else
                                        <input type="hidden" name="is_publish" value="0">
                                        <i class="fas fa-lock"></i>
                                    @endif
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-md-5">
            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">Showing Page {{ $user_posts->currentPage() }} of {{ $user_posts->total() }}
            </div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                {!! $user_posts->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
