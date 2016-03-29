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
<br>

<div class="clearfix"></div>

<hr>
<div class="col-md-12 text-center"><p><a href="#" target="_ext"></a><br><a href="" target="_ext">&copy; Copyright <?php echo date("Y"); ?>&nbsp; tskillsc,&nbsp;Allright reserved.</a></p></div>
<hr>
</div>
@stop