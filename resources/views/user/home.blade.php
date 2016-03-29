@extends('user.theme')
@section('content')
<div class="container" id="main">
@if(Session::has('info'))
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<div class="alert alert-info alert-message" role="alert">
{{ Session::get('info')}}
</div>
</div>
<div class="col-sm-3"></div>
</div>
@endif
<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert-message").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script>
<div class="row">
<div class="col-md-3 col-sm-6">
<div class="panel panel-default">
<div class="panel-heading"><a href="#" class="pull-right">&times;</a> <h4>reg</h4></div>
<div class="panel-body">
<ul class="list-inline"> <i class="glyphicon glyphicon-upload"></i></ul>
</div>
</div>
<div class="well"> 
<form class="form-horizontal" role="form">
<h4>Registration</h4>
<div class="form-group" style="padding:14px;">

</div>
<button class="btn btn-success pull-right" type="button"><i class="glyphicon glyphicon-edit"></i></button><ul class="list-inline"><li></li><li></li><li></li></ul>
</form>
</div>
</div>
<div class="col-md-9 col-sm-6">
<div class="panel panel-default">
<div class="panel-heading"><a href="#" class="pull-right">&times;</a> 
<h4>Register the price:</h4></div>		  
<div class="panel-body">
<form class="form-vertical" role="form" method="POST" action="{{route('save')}}">
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
<script type="text/javascript">
document.getElementById("price").onmouseout=function (){    

//number-format the user input
this.value= parseFloat(this.value.replace(/,/g, ""))
.toFixed(2)
.toString()
.replace(/\B(?=(\d{3})+(?!\d))/g, ",");


}
</script>
</div>
</div>

</div>
</div><!--/row-->

<hr>

<div class="row">
<div class="col-sm-4 col-xs-6">
<div class="panel panel-default">
<div class="panel-thumbnail"><img src="#" class="img-responsive"></div>
<div class="panel-body">
<p class="lead">Hacker News</p>
<p>120k Followers, 900 Posts</p>

<p>
<img src="#" width="28px" height="28px">
<img src="#" width="28px" height="28px">
</p>
</div>
</div>
</div><!--/col-->

<div class="col-sm-4 col-xs-6">
<div class="panel panel-default">
<div class="panel-thumbnail"><img src="#" class="img-responsive"></div>
<div class="panel-body">
<p class="lead">Bootstrap Templates</p>
<p>902 Followers, 88 Posts</p>

<p>
<img src="#" width="28px" height="28px">
<img src="#" width="28px" height="28px">
</p>
</div>
</div>
</div><!--/col-->

<div class="col-sm-4 col-xs-6">
<div class="panel panel-default">
<div class="panel-thumbnail"><img src="#" class="img-responsive"></div>
<div class="panel-body">
<p class="lead">Social Media</p>
<p>19k Followers, 789 Posts</p>

<p>
<img src="#" width="28px" height="28px">
<img src="#" width="28px" height="28px">
</p>
</div>
</div>
</div><!--/col-->

</div>


<div class="clearfix"></div>

<hr>
<div class="col-md-12 text-center"><p><a href="#" target="_ext"></a><br><a href="" target="_ext">&copy; Copyright <?php echo date("Y"); ?> &nbsp;tskillsc,&nbsp;Allright reserved.</a></p></div>
<hr>
</div>
@stop