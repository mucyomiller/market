@extends('admin.admin_template')
@push('page_header')
<section class="content-header">
    <h1>
    Dashboard
    <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> category</a></li>
    <li class="active">Dashboard</li>
    </ol>
    </section>
@endpush

@section('content')
<div class="row">
<div class="col-md-6">
<!-- Add category Form -->
<div class="box box-info">
<div class="box-header with-border">
<h3 class="box-title">Add Category Form</h3>
</div><!-- /.box-header -->
<form action="{{route('admin.addcategory')}}" method="POST" class="form-horizontal">
<script type="text/javascript">
  window.setTimeout(function() {
    $(".alert-message").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 3000);
</script>
@if(Session::has('info'))
<div class="alert alert-success alert-message">{{ Session::get('info') }}</div>
@endif
<div class="box-body">
<div class="form-group {{ $errors->has('category')? ' has-error':''}} ">
<label for="inputcat" class="col-sm-2 control-label text-green">Category </label>
<div class="col-sm-10">
<input type="text"  name="category" class="form-control" id="inputcat" value="{{ old('category')}}" placeholder="Enter new category name">
@if($errors->has('category'))
<span class="help-block">{{ $errors->first('category') }}</span>
@endif
</div>
</div>
<div class="form-group {{ $errors->has('description')? ' has-error':''}} ">
<label for="description" class="col-sm-2 control-label text-green">Description</label>
<div class="col-sm-10">
<textarea name="description" id="description"  value="{{ old('category') }}" class="form-control" rows="5"  placeholder="Enter few category description" >
</textarea>
@if($errors->has('description'))
<span class="help-block">{{ $errors->first('description') }}</span>
@endif
</div>
</div>
<div class="form-group">
<div class="col-sm-10">
<input type="hidden"  name="_token"  value="{{ csrf_token() }}" class="form-control">
</div>
</div>
</div><!-- /.box-body -->
<div class="box-footer">
<button type="submit" class="btn btn-info pull-right">Add</button>
</div><!-- /.box-footer -->
</form>
</div>
</div>
<div class="col-md-6">
    <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">All Categories</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                  @if(isset($categories))
                  @foreach ($categories as $category)
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">{{ $category->category_name }}</a><span class="pull-right"><a class="btn btn-danger btn-xs" href="delete?scope=category&id={{ $category->id }}">
  <i class="fa fa-trash-o"></i> Delete</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="#"><span class="label label-info">{{ $category->products->count() }}</span></a></span>
                        <span class="product-description">
                          {{ $category->description }}
                        </span>
                      </div>
                    </li><!-- /.item -->
                    @endforeach
                    @endif
                  </ul>
                </div><!-- /.box-body -->
                <div class="box-footer text-center">
                  <a href="#" class="uppercase"><i class="fa fa-arrow-up"></i></a>
                </div><!-- /.box-footer -->
              </div><!-- /.box -->
</div>
</div>
@endsection