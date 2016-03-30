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
<div class="panel-heading"><a href="#" class="pull-right">&times;</a> <h4></h4></div>
<div class="panel-body">
<ul class="list-inline"> <i class="glyphicon glyphicon-upload"></i></ul>
</div>
</div>
<div class="well"> 
<form class="form-horizontal" role="form">
<h4>Contacts</h4>
<div class="form-group" style="padding:14px;">

</div>
<button class="btn btn-success pull-right" type="button"><i class="glyphicon glyphicon-edit"></i></button><ul class="list-inline"><li></li><li></li><li></li></ul>
</form>
</div>
</div>
<div class="col-md-9 col-sm-6">
<div class="panel panel-default">
<div class="panel-heading"> 
<h4>Give us your idea or question</h4></div>
<div class="panel-body">
<b>
If you find a product/category that is not listed feel free to tell us so that we can add it as soon as possible:
</div>
</div>
<div class="panel panel-default">
<div class="panel-heading"><a href="#" class="pull-right">&times;</a> 
<h4>Contact US:</h4></div>      
<div class="panel-body">
<form class="form-vertical" role="form" method="POST" action="{{route('send')}}">
<div class="form-group{{$errors->has('product')?' has-error':'' }}">
<label class="control-label" for="form-subject">Subject:</label>
<input type="text" name="subject" placeholder="Enter Your Subject" class="form-subject form-control" required />
@if($errors->has('sign-in-phone'))
<span class="help-block">{{$errors->first('sign-in-phone')}}</span>
@endif
</div>
<div class="form-group">
<label class="control-label" for="form-message">Message:</label>
<textarea  name="message" class="form-message form-control" placeholder="Enter Your Message Here!"></textarea>
</div>
<div class="form-group">
<button type="submit" class="btn btn-raised btn-info">send</button>
</div>
{!! csrf_field() !!} 
</form>
</div>
</div>
</div>
</div>
<!--/row-->
<hr>
@include('user.endcontents')
<div class="clearfix"></div>

<hr>
<div class="col-md-12 text-center"><p><a href="#" target="_ext"></a><br><a href="" target="_ext">&copy; Copyright <?php echo date("Y"); ?> &nbsp;tskillsc,&nbsp;Allright reserved.</a></p></div>
<hr>
</div>
@stop