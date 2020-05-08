@extends('sentences.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Sentence</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('sentences.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('sentences.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>TEXT :</strong>
                <input type="text" name="text" class="form-control" placeholder="text">
            </div>
        </div>
        <!--<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>TYPE:</strong>
                <input type="text" class="form-control" name="type_id" placeholder="type_id">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>TAG :</strong>
                <input type="text" name="tag" class="form-control" placeholder="tag">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>LEVEL:</strong>
                <input type="text" class="form-control" name="level_id" placeholder="level_id">
            </div>
        </div> -->
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection