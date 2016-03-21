@extends('templates.default')
@section('content')
        <!-- Main content -->
        <section class="content">
        <div class="row" style="height:100px"></div>
        <div class="row">
        <div class="col-lg-12">
            <div class="error-page">
            <h1 class="headline text-red"> 404</h1>
            <div class="error-content">
              <h3><i class="fa fa-warning text-red"></i> Oops! Page Not Found.</h3>
              <p>
                We could not find the page you were looking for.
                Meanwhile, you may <a href="{{ route('index')}}">return to home</a>
              </p>
            </div><!-- /.error-content -->
          </div><!-- /.error-page -->
          </div>
        </div>
        </section><!-- /.content -->
@endsection