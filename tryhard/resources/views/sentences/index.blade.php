@extends('sentences.layout')
    <br/>
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <form class="form-inline active-cyan-4" action="{{ route('sentences.store') }}" method="POST">
                @csrf
                  <input id="txtSearch" class="form-control form-control-sm mr-3 w-75" tabindex="1" type="text" name="text" placeholder="text"
                    aria-label="text">
                  <button name="action" value="search" class="btn btn-outline-white btn-md my-0 ml-sm-2 waves-effect waves-light" tabindex="2" type="submit">Search</button>
                  <button type="submit" tabindex="3" name="action" value="save" class="btn btn-primary">Submit</button>
                  <!--<a class="btn btn-success" href="{{ route('sentences.create') }}"> New</a>-->
            </form>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   <div class="row">
        <div class="col-lg-12">
            <table class="table table-bordered">
                <tr>
                    <th width="5%">No</th>
                    <th width="85%">TEXT</th>
                    <th width="10%">Action</th>
                </tr>
                @foreach ($results as $sentence)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td><span name="sentence">{{ $sentence->text }}</span></td>
                    <td>
                        <form style="margin-bottom: 0" action="{{ route('sentences.destroy',$sentence->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
        {!! $results->links() !!}
@endsection
