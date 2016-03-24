@extends('templates.default')
@section('content')
<div class="row">
<div class="col-lg-4">
</div>
<div class="col-lg-4">
	<h3>Sign In here:</h3>
     {!! Form::open(array('url' =>'signin'))!!}
      {!! csrf_field() !!}
	<div class="form-group{{$errors->has('sign-in-phone')?' has-error':'' }}">
	    <label class="control-label" for="form-phone">Phone:</label>
	    <input type="text" name="sign-in-phone" placeholder="Enter your Phone" class="form-phone form-control" id="form-phone" value={{Request::old('sign-in-phone')?:''}}>
	   @if($errors->has('sign-in-phone'))
              <span class="help-block">{{$errors->first('sign-in-phone')}}</span>
	   @endif
	</div>
	<div class="form-group{{$errors->has('sign-in-pin')?' has-error':'' }}">
	<label class="control-label" for="form-pin">Pin :</label>
	<input type="password" name="sign-in-pin" placeholder="Enter your Pin" class="form-pin form-control" id="form-pin" >
	 @if($errors->has('sign-in-pin'))
              <span class="help-block">{{$errors->first('sign-in-pin')}}</span>
	   @endif
	</div>
    <div class="checkbox">
    	<label>
    		<input type="checkbox" name="remember">Remember me
    </label>
      </div>
      <div class="form-group">
    <button type="submit" class="btn btn-raised btn-info">sign in</button>
</div>
{!!Form::close() !!}
</div>
<div class="col-lg-4">
</div>
</div>
@stop