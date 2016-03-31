@extends('user.theme')
@section('content')
<div class="container" id="main">
<div class="row">
<div class="col-md-4 col-sm-6">
  <div class="panel panel-default">
    <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Profile Picture</h4></div>
  <div class="panel-body">
<img src="{{asset('user/img/photo_002.png')}}" class="img img-responsive"/><br/>
<ul class="list-inline"><a style="text-decoration: none;" href="profile.php?username=#&action=change">change profile picture &nbsp;&nbsp;&nbsp;<i class="glyphicon glyphicon-upload"></i></a></ul>
      </div>
</div>
<div class="well"> 
<form class="form-horizontal" role="form">
<h4>Profile Info</h4>
<div class="form-group" style="padding:14px;">
<ul class="list-unstyled">
<li>  <label>firstname:</label>&nbsp;&nbsp;{{ucfirst(Auth::user()->user()->personInfo->firstname)}}</li>
<li> <label>lastname:</label> &nbsp;&nbsp;{{ucfirst(Auth::user()->user()->personInfo->lastname)}}</li>
<li>  <label>id number:</label>&nbsp;&nbsp;{{Auth::user()->user()->personInfo->idnumber}}</li>
<li>  <label>Category:</label>&nbsp;&nbsp; {{Auth::user()->user()->category->category_name}}</li>
<li>  <label>Market:</label>&nbsp;&nbsp; {{Auth::user()->user()->market->market_name}}</li>
</ul>
</div>
<button class="btn btn-success pull-right" type="button">Update Info &nbsp;<i class="glyphicon glyphicon-edit"></i></button><ul class="list-inline"><li></li><li></li><li></li></ul>
</form>
<!--end of information-->
</div>

</div>
<div class="col-md-8 col-sm-6">
   
    <div class="well"> 
      
    </div>

   <div class="panel panel-default">
     <div class="panel-heading"><a href="#" class="pull-right">View all</a> <h4>Bootply Editor &amp; Code Library</h4></div>
  <div class="panel-body">
        <p><img src="#" class="img-circle pull-right"> <a href="#">The Bootstrap Playground</a></p>
        <div class="clearfix"></div>
        <hr>
        lorem 
      </div>
   </div>
</div>

</div>
<!--/row-->

<hr>
@include('user.endcontents')
<br>

<div class="clearfix"></div>
@stop