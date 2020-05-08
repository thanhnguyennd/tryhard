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

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif
            <div class="row">
              <div class="col-sm-12">
                  <table class="table table-bordered table-hover dataTable"  id="data" class="display" style="width:100%">
                      <thead>
                      <tr role="row">
                          <th class="sorting_asc" tabindex="0" rowspan="1" colspan="1" aria-sort="ascending" aria-label="No: activate to sort column descending" style="width: 5px;">No<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort-up" class="svg-inline--fa fa-sort-up fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M279 224H41c-21.4 0-32.1-25.9-17-41L143 64c9.4-9.4 24.6-9.4 33.9 0l119 119c15.2 15.1 4.5 41-16.9 41z"></path></svg>
                          </th>
                          <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Content: activate to sort column ascending" style="width: 40%">Content<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                          </th>
                          <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Description: activate to sort column ascending" style="width: 30%">Description<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                          </th>
                          <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Create date: activate to sort column ascending" style="width: 15%;">Create date<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
                          </th>
                          <th class="sorting" tabindex="0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 5%;">Actions<svg data-fa-pseudo-element=":after" data-prefix="fas" data-icon="sort" class="svg-inline--fa fa-sort fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg=""><path fill="currentColor" d="M41 288h238c21.4 0 32.1 25.9 17 41L177 448c-9.4 9.4-24.6 9.4-33.9 0L24 329c-15.1-15.1-4.4-41 17-41zm255-105L177 64c-9.4-9.4-24.6-9.4-33.9 0L24 183c-15.1 15.1-4.4 41 17 41h238c21.4 0 32.1-25.9 17-41z"></path></svg>
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
                  </table>
          </div>
        </div>

        <script>
            $(document).ready(function() {
                $('#data').DataTable( {
                    ajax: {
                        url: '/api/user/data',
                        dataSrc: 'data'
                    },
                    columns: [
                        { data: 'id' },
                        { data: 'word_content' },
                        { data: 'word_description' },
                        { data: 'created_at' },
                        { data: 'updated_at' },
                    ]
                } );
            } );
        </script>
      </div>
    </div>
@endsection