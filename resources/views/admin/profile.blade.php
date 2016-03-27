@extends('admin.admin_template')
@push('page_header')
<section class="content-header">
<h1>
Admin Profile
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Admin profile</a></li>
<li><a href="#">Dashboard</a></li>
</ol>
</section>
@endpush
@section('content')
<div class="row">
  <div class="col-md-3">

    <!-- Profile Image -->
    <div class="box box-primary">
      <div class="box-body box-profile">
        <img class="profile-user-img img-responsive img-circle" src="{{ asset('admin/dist/img/fred.jpg')}}" alt="Admin profile picture">
        <h3 class="profile-username text-center">{{ $admin->firstname."  ".$admin->lastname}}</h3>
        <p class="text-muted text-center">{{$admin->job_title}}</p>
        <a href="#settings" data-toggle="tab" class="btn btn-primary btn-block"><b>update profile info</b></a>
      </div><!-- /.box-body -->
    </div><!-- /.box -->

    <!-- About Me Box -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class="box-title">About Me</h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
        <p class="text-muted">
          B.S. in Computer engineering from the University of Rwanda at cst
        </p>

        <hr>

        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
        <p class="text-muted">Kigali, Rwanda</p>

        <hr>

        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
        <p>
          <span class="label label-danger">UI Design</span>
          <span class="label label-success">Coding</span>
          <span class="label label-info">Javascript</span>
          <span class="label label-warning">PHP</span>
          <span class="label label-primary">Node.js</span>
        </p>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div><!-- /.col -->
  <div class="col-md-9">
    <div class="nav-tabs-custom">
      <ul class="nav nav-tabs">
        <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
        <li><a href="#photo" data-toggle="tab">profile photo</a></li>
        <li><a href="#settings" data-toggle="tab">Settings</a></li>
      </ul>
      <div class="tab-content">
        <div class="active tab-pane" id="activity">
          <!-- Post -->
          <div class="post">
            <div class="user-block">
              <img class="img-circle img-bordered-sm" src="{{asset('admin/dist/img/user1-128x128.jpg') }}" alt="user image">
              <span class='username'>
                <a href="#">Miller M.</a>
                <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
              </span>
              <span class='description'>Shared publicly - 7:30 PM today</span>
            </div><!-- /.user-block -->
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>
            <ul class="list-inline">
              <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
              <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a></li>
              <li class="pull-right"><a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments (5)</a></li>
            </ul>

            <input class="form-control input-sm" type="text" placeholder="Type a comment">
          </div><!-- /.post -->

          <!-- Post -->
          <div class="post clearfix">
            <div class='user-block'>
              <img class='img-circle img-bordered-sm' src="{{asset('admin/dist/img/user7-128x128.jpg')}}" alt='user image'>
              <span class='username'>
                <a href="#">Sarah Ross</a>
                <a href='#' class='pull-right btn-box-tool'><i class='fa fa-times'></i></a>
              </span>
              <span class='description'>Sent you a message - 3 days ago</span>
            </div><!-- /.user-block -->
            <p>
              Lorem ipsum represents a long-held tradition for designers,
              typographers and the like. Some people hate it and argue for
              its demise, but others ignore the hate as they create awesome
              tools to help create filler text for everyone from bacon lovers
              to Charlie Sheen fans.
            </p>

            <form class='form-horizontal'>
              <div class='form-group margin-bottom-none'>
                <div class='col-sm-9'>
                  <input class="form-control input-sm" placeholder="Response">
                </div>                          
                <div class='col-sm-3'>
                  <button class='btn btn-danger pull-right btn-block btn-sm'>Send</button>
                </div>                          
              </div>                        
            </form>
          </div><!-- /.post -->
        </div><!-- /.tab-pane -->
        <div class="tab-pane" id="photo">
          <div class="row">
          <div class="col-md-6">
          <form class="form-horizontal dropzone" action={{ url('admin/upload') }} method="POST" style="  height:150px;background:#ccc;">
            {{ csrf_field() }}    
            <input type="hidden" name="adminid" value="{{$admin->id}}" />
          </form>
          </div>
          </div>
        </div>
        <div class="tab-pane" id="settings">
          <form class="form-horizontal" action=# method="POST">
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">FirstName</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="First Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">LastName</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Last Name">
              </div>
            </div>
            <div class="form-group">
              <label for="inputName" class="col-sm-2 control-label">Job Title</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" placeholder="Job Title">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEmail" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail" placeholder="Email">
              </div>
            </div>
            <div class="form-group">
              <label for="inputEducation" class="col-sm-2 control-label">Education</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="inputEducation" placeholder="Education"></textarea>
              </div>
            </div>
            <div class="form-group">
              <label for="inputLocation" class="col-sm-2 control-label">Location</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputLocation" placeholder="Location">
              </div>
            </div>
            <div class="form-group">
              <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
              </div>
            </div>
            <div class="form-group">
              <label for="inputPassword" class="col-sm-2 control-label">Password</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="inputPassword" placeholder=" Current Password">
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                  <label>
                  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                    {{ csrf_field() }}
                  </label>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-danger">Submit</button>
              </div>
            </div>
          </form>
        </div><!-- /.tab-pane -->
      </div><!-- /.tab-content -->
    </div><!-- /.nav-tabs-custom -->
  </div><!-- /.col -->
</div><!-- /.row -->
@endsection