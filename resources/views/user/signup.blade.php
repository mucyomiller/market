@extends('templates.default')
@section('content')
<div class="row">
<div class="col-lg-3">
</div>
<div class="col-lg-6">
<h3> Sign Me Up</h3> 
{!! Form::open(array('url' =>'signup','files'=>true))!!}
<div class="form-group{{$errors->has('firstname')?' has-error':'' }} label-floating">
    <label class="control-label" for="form-first-name">Firstname :</label>
    <input type="text" name="firstname"  class="form-firstname form-control" id="firstame" placeholder="Enter Your Firstname" value="{{Request::old('firstname')?:''}}" >
   @if($errors->has('firstname'))
          <span class="help-block">{{$errors->first('firstname')}}</span>
   @endif
</div>
<div class="form-group{{$errors->has('lastname')?' has-error':'' }} label-floating">
   <label class=" control-label" for="form-lastname">Lastname :</label>
   <input type="text" name="lastname" placeholder="Enter Your Lastname" class="form-lastname form-control" id="form-lastname" 
   value="{{Request::old('lastname')?:''}}">
     @if($errors->has('lastname'))
          <span class="help-block">{!!$errors->first('lastname')!!}</span>
   @endif
</div>
<div class="form-group{{$errors->has('idnumber')?' has-error':'' }} label-floating">
    <label class="control-label" for="form-idnumber">ID number :</label>
    <input type="text" name="idnumber" placeholder="Enter Your Id number" class="form-idnumber form-control" id="form-idnumber" 
      value="{{Request::old('idnumber')?:''}}" >
  @if($errors->has('idnumber'))
          <span class="help-block">{{$errors->first('idnumber')}}</span>
   @endif
</div>
<div class="form-group{{$errors->has('phone')?' has-error':'' }} label-floating">
	<label class="control-label" for="form-phone">Phone :</label>
	<input type="text" name="phone" placeholder="Enter Your Phone" class="form-phone form-control" id="form-phone" 
	value="{{Request::old('phone')?:''}}" >
     @if($errors->has('phone'))
          <span class="help-block">{!!$errors->first('phone')!!}</span>
   @endif
</div>

<div class="form-group{{$errors->has('province')?' has-error':'' }}">
	<label class="control-label" for="form-province">Select province :</label>
	<select name="province" class="form-province form-control" id="form-province" value="{{Request::old('province')?:''}}">
		<option selected="selected" disabled></option>
		@foreach($provinces as $province)
		<option value="{{$province->id}}" >{{$province->province_name}}</option>
           @endforeach
	</select>
 @if($errors->has('province'))
          <span class="help-block">{{$errors->first('province')}}</span>
   @endif

</div>
<div class="form-group{{$errors->has('district')?' has-error':'' }}">
	<label class="control-label" for="form-district">Select District :</label>
	<select name="district" class="form-district form-control" id="form-district" value="{{Request::old('district')?:''}}">
		<option selected="selected" disabled></option>
	</select>
  @if($errors->has('district'))
          <span class="help-block">{{$errors->first('district')}}</span>
   @endif
</div>
<div class="form-group{{$errors->has('sector')?' has-error':'' }}">
	<label class="control-label" for="form-sector">Select Sector :</label>
	<select name="sector" class="form-sector form-control" id="form-sector" value="{{Request::old('sector')?:''}}">
		<option value=""></option>
	</select>
  @if($errors->has('sector'))
          <span class="help-block">{{$errors->first('sector')}}</span>
   @endif
</div>
<div class="form-group{{$errors->has('cell')?' has-error':'' }}">
	<label class="control-label" for="form-cell">Select Cell:</label>
	<select name="cell" class="form-cell form-control" id="form-cell"  value="{{Request::old('cell')?:''}}">
		<option value=""></option>
	</select>
	 @if($errors->has('cell'))
          <span class="help-block">{{$errors->first('cell')}}</span>
   @endif
</div>
<div class="form-group{{$errors->has('market')?' has-error':'' }}">
<label class="control-label" for="form-market">Select market :</label>
<select name="market" class="form-control" id="form-market"  value="{{Request::old('market')?:''}}">
<option value=""></option>	
</select>
 @if($errors->has('market'))
          <span class="help-block">{{$errors->first('market')}}</span>
   @endif
</div>
	<div class="form-group{{$errors->has('category')?' has-error':'' }}">
<label class="control-label" for="form-category">Select Category :</label>
<select name="category" class="form-control" id="form-category" value="{{Request::old('category')?:''}}">
		<option selected="selected" disabled></option>
	@foreach($categories as $category)
		<option value="{{$category->id}}" >{{$category->category_name}}</option>
           @endforeach
</select>
@if($errors->has('category'))
          <span class="help-block">{{$errors->first('category')}}</span>
   @endif
</div>
<div class="form-group{{$errors->has('pin')?' has-error':'' }} label-floating">
	<label class="control-label" for="form-pin">Pin :</label>
	<input type="password" name="pin" placeholder="Enter Your Pin" class="form-pin form-control" id="form-pin" value="{{Request::old('pin')?:''}}">
	@if($errors->has('pin'))
          <span class="help-block">{{$errors->first('pin')}}</span>
   @endif
</div>
<div class="form-group{{$errors->has('pin-validation')?' has-error':'' }} label-floating">
	<label class="control-label" for="form-pin">Re-enter Pin :</label>
	<input type="password" name="pin-validation" placeholder=" rewrite Your Pin Again" class="form-pin form-control" id="form-pin" value="{{Request::old('pin-validation')?:''}}">
	@if($errors->has('pin-validation'))
          <span class="help-block">{{$errors->first('pin-validation')}}</span>
   @endif
</div>
<div class="form-group">
<button type="submit" class="btn btn-raised btn-primary">Sign me up!</button>
 </div>
 <input type="hidden" name="_token" value="{{Session::token()}}"></input>
{!!Form::close() !!}
</div>
<div class="col-lg-3">
</div>
</div>
@push('scripts')
<script type="text/javascript">
$('#form-province').on('change',function(e){
console.log(e);
var prov_id=e.target.value;
$.get('getDistrict?prov_id=' +prov_id, function(data){ 
    $('#form-district').empty();
    $('#form-district').append('<option selected="selected" disabled></option>');
   $.each(data,function(index,subcatobj){

       $('#form-district').append('<option value="'+subcatobj.id+'">'+subcatobj.district_name+'</option>');
   });

});

});
</script>


<script type="text/javascript">
$('#form-district').on('change',function(e){
console.log(e);
var distr_id=e.target.value;
$.get('getSector?distr_id=' +distr_id, function(data){ 
    $('#form-sector').empty();
      $('#form-sector').append('<option selected="selected" disabled></option>');
   $.each(data,function(index,subcatobj){

       $('#form-sector').append('<option value="'+subcatobj.id+'">'+subcatobj.sector_name+'</option>');
   });

});

});

</script>



<script type="text/javascript">
$('#form-sector').on('change',function(e){
console.log(e);
var sect_id=e.target.value;
$.get('getCell?sect_id=' +sect_id, function(data){ 
    $('#form-cell').empty();
      $('#form-cell').append('<option selected="selected" disabled></option>');
   $.each(data,function(index,subcatobj){

       $('#form-cell').append('<option value="'+subcatobj.id+'">'+subcatobj.cell_name+'</option>');
   });

});

});

</script>


<script type="text/javascript">
$('#form-cell').on('change',function(e){
console.log(e);
var cell_id=e.target.value;
$.get('getMarket?cell_id=' +cell_id, function(data){ 
    $('#form-market').empty();
      $('#form-market').append('<option selected="selected" disabled></option>');
   $.each(data,function(index,subcatobj){

       $('#form-market').append('<option value="'+subcatobj.id+'">'+subcatobj.market_name+'</option>');
   });

});

});

</script>
@endpush
@stop