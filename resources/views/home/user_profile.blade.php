@extends('layouts.app')
@section('content')
	<form id="userProfile" method="POST" action="{{ url('/profile') }}" class="form-horizontal" enctype="multipart/form-data">
	{{csrf_field()}}
        <div class="form-group">
            <label class="col-xs-3 control-label">Name</label>
            <div class="col-xs-5">
                <input type="text" class="form-control" name="name" id="nameProfile" value="{{ Auth::user()->name }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Email Id</label>
            <div class="col-xs-5">
                <input type="text" class="form-control" name="email" id="emailProfile" value="{{ Auth::user()->email }}" />
            </div>
        </div>

        <div class="form-group">
            <label class="col-xs-3 control-label">Image</label>
            <div class="col-xs-5">
                <input type="file" class="form-control" name="image" id="imageProfile" />
            </div>
        </div>

        <div class="form-group">
            <div class="col-xs-5 col-xs-offset-3">
            	<a href="javascript:;" class="btn btn-primary" id="profileEdit">Edit</a>
                <button type="submit" style="display: none;" class="btn btn-primary" id="profileSubmit">Save</button>
            </div>
        </div>
    </form>
    @if (count($errors) > 0)
	    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
	    </div>
	@endif
@endsection