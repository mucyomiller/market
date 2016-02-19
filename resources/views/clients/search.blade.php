@extends('templates.default')
 @section('content')
         <div class="col-md-4">
             {!! Form::open(array('url' =>'sector'))!!}
                     {!! csrf_field() !!}
                     <h3>Choose Sector:</h3>
				<select name="category" class="form-control" id="form-category" value={{Request::old('category')?:''}}>
			         <option selected="selected" disabled></option>
		               @foreach($sectors as $sector)
			         <option value="{{$sector->id}}" >{{$sector->sector_name}}</option>
                          @endforeach
	</select>
				<button type="submit" class="btn btn-default">Search</button>
		<input type="hidden" name="_token" value="{{Session::token()}}"></input>
{!!Form::close() !!}
</div>
   
     <div class="col-md-4">
             {!! Form::open(array('url' =>'district'))!!}
                     {!! csrf_field() !!}
                     <h3>Choose Districts:</h3>
				<select name="district" class="form-control" id="form-category" value={{Request::old('category')?:''}}>
			         <option selected="selected" disabled></option>
		               @foreach($districts as $district)
			         <option value="{{$district->id}}" >{{$district->district_name}}</option>
                          @endforeach
	</select>
				<button type="submit" class="btn btn-default">Search</button>
		<input type="hidden" name="_token" value="{{Session::token()}}"></input>
{!!Form::close() !!}
</div>
@endsection