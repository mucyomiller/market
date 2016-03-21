@extends('clients.clients_templates')
@section('content')
<div class="col-md-4"></div>
         <div class="col-md-4">
             {!! Form::open(array('url' =>'product'))!!}
                     {!! csrf_field() !!}
            <fieldset>
        <div class="form-group{{$errors->has('product')?' has-error':'' }}">
          <input type="text" placeholder="Search" class="form-product form-control" name="product" value={{Request::old('product')?:''}}>
           @if($errors->has('product'))
              <span class="help-block">{{$errors->first('product')}}</span>
	           @endif
	          </div>
          <button type="submit" class="btn btn-default">Search</button>
        </fieldset>
		<input type="hidden" name="_token" value="{{Session::token()}}"></input>
{!!Form::close() !!}
</div>
@endsection