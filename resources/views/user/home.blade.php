@extends('templates.default')
@section('content')
<div class="row">
	<div class="col-lg-4"></div>
<div class="col-lg-3">
	<h3>Register the price:</h3>
     <form method="POST" action="{{route('save')}}">
         {!! csrf_field() !!}
	<div class="form-group{{$errors->has('product')?' has-error':'' }}">
	    <label class="control-label" for="form-product">Product:</label>
	    <select name="product" class="form-control" id="product"  value={{Request::old('product')?:'' }} required="required">
	    <option selected="selected" disabled></option>
	     @foreach($products as $product)
		<option value="{{$product->id}}">{{$product->product_name}}...{{$product->quantity_unit}}</option>
        @endforeach
  </select>
	   @if($errors->has('sign-in-phone'))
              <span class="help-block">{{$errors->first('sign-in-phone')}}</span>
	   @endif
	</div>
	<div class="form-group{{$errors->has('price')?' has-error':'' }}">
	<label class="control-label" for="form-price">Price:</label>
	<input type="text" name="price" placeholder="Enter Today price" class="form-price form-control" id="pric" pattern="[0-9]*"
	required="required"><br>
	 @if($errors->has('price'))
              <span class="help-block">{{$errors->first('price')}}</span>
	   @endif
	</div>
      <div class="form-group">
    <button type="submit" class="btn btn-raised btn-info">Register</button>
</div>
 <input type="hidden" name="_token" value="{{Session::token()}}"></input>
</form>
</div>
<script type="text/javascript">
document.getElementById("price").onmouseout=function (){    

    //number-format the user input
    this.value= parseFloat(this.value.replace(/,/g, ""))
                    .toFixed(2)
                    .toString()
                    .replace(/\B(?=(\d{3})+(?!\d))/g, ",");


}
</script>
@stop