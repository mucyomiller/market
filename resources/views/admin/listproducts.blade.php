@extends('admin.admin_template')
@push('page_header')
<section class="content-header">
    <h1>
    Category name : 
    <small><strong><a href="{{route('admin.listcategory')}}">{{ $category->category_name }}</a></strong></small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> products</a></li>
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
<h3 class="box-title">Add Product Form</h3>
</div><!-- /.box-header -->
<form action="{{route('admin.addproduct',['cat_id'=>$category->id])}}" method="POST" class="form-horizontal">
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
<div class="form-group {{ $errors->has('product_name')? ' has-error':''}} ">
<label for="inputcat" class="col-sm-2 control-label text-green">Product </label>
<div class="col-sm-10">
<input type="text"  name="product_name" class="form-control" id="inputcat" value="{{ old('product_name')}}" placeholder="Enter new product name">
@if($errors->has('product_name'))
<span class="help-block">{{ $errors->first('product_name') }}</span>
@endif
</div>
</div>
<div class="form-group {{ $errors->has('quantity_unit')? ' has-error':''}} ">
<label for="quantity_unit" class="col-sm-2 control-label text-green">Q. unit</label>
<div class="col-sm-10">
<input type="text" class="form-control" name="quantity_unit" value="{{ old('quantity_unit')}}" placeholder="Enter Quantity unit">
@if($errors->has('quantity_unit'))
<span class="help-block">{{ $errors->first('quantity_unit') }}</span>
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
<button type="submit" class="btn btn-info pull-right">Add Product</button>
</div><!-- /.box-footer -->
</form>
</div>
</div>
<div class="col-md-6">
    <!-- PRODUCT LIST -->
              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Products in this category</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <!--<button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>-->
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <ul class="products-list product-list-in-box">
                  @if(empty($products))
                  <li class="item">
                      <h3 class="text-aqua">No Products Found in this category</h3>
                    </li>
                  @else
                  @foreach ($products as $product)
                    <li class="item">
                      <div class="product-img">
                        <img src="dist/img/default-50x50.gif" alt="Product Image">
                      </div>
                      <div class="product-info">
                        <a href="javascript::;" class="product-title">{{ $product->product_name }}</a><span class="pull-right"><a class="btn btn-danger btn-xs" href="delete?scope=product&prod_id={{ $product->id }}&cat_id={{$category->id}}">
  <i class="fa fa-trash-o"></i> Delete</a></span>
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