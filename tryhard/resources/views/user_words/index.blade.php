@extends('layouts.admin')

@section('content')
    <script>
        $('input[type="search"]').bind("focusout", function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                $("form").submit();
            }
        });
    </script>
    <div class="card-header">Your words</div>
    <div class="card-body">
        <div class="datatable table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
              <div class="row">
                <div class="col-sm-12 col-md-6">
                  <div class="dataTables_length" id="dataTable_length">
                </div>
              </div>
              <div class="col-sm-12 col-md-6">
                <div id="dataTable_filter" class="dataTables_filter">
                    <form action="{{ route('user_words.search') }}" method="POST">
                        @csrf
                        <label>Search:
                        <input type="search" class="form-control form-control-sm" placeholder="" name="search_key" aria-controls="dataTable">
                        </label>
                    </form>
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
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Content: activate to sort column ascending" style="width: 40%">Content<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 30%">Description<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Create date: activate to sort column ascending" style="width: 15%;">Create date<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                        </th>
                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 5%;">Actions<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                        </th>
                    </tr>
                </thead>
                <tfoot>
                    <tr><th rowspan="1" colspan="1">No</th>
                        <th rowspan="1" colspan="1">Content</th>
                        <th rowspan="1" colspan="1">Description</th>
                        <th rowspan="1" colspan="1">Create date</th>
                        <th rowspan="1" colspan="1">Actions</th></tr>
                </tfoot>
                <tbody>
                    @foreach ($user_words as $word)
                    <tr role="row" class="odd">
                        <td class="sorting_1">{{ ++$i }}</td>
                        <td>
                            <a href="{{ route('user_posts.show',Crypt::encrypt($word->id)) }}">
                                {{ $word->word_content }}
                            </a>

                        </td>
                        <td>{{ $word->word_description }}</td>
                        <td>{{ $word->created_at }}</td>
                        <td>
                            <form style="display: -webkit-inline-box;" action="{{ route('user_words.destroy',Crypt::encrypt($word->id)) }}" method="POST">
                                <a href="{{ route('user_words.edit',Crypt::encrypt($word->id)) }}" class="btn btn-datatable btn-icon btn-transparent-dark mr-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle>
                                    </svg>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-datatable btn-icon btn-transparent-dark">
                                    <i class="far fa-trash-alt"></i>
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
            <div class="dataTables_info" id="dataTable_info" role="status" aria-live="polite">
                Showing {{ $user_words->firstItem() }} to {{ $user_words->lastItem() }} of {{ $user_words->total() }} entries
            </div>
          </div>
          <div class="col-sm-12 col-md-7">
            <div class="dataTables_paginate paging_simple_numbers" id="dataTable_paginate">
                {!! $user_words->links() !!}
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection