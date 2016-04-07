@extends('admin.admin_template')
@push('page_header')
<section class="content-header">
<h1>
Dashboard
<small>Control panel</small>
</h1>
<ol class="breadcrumb">
<li><a href="#"><i class="fa fa-dashboard"></i> Markets</a></li>
<li class="active">Dashboard</li>
</ol>
</section>
@endpush
@section('content')
<div class='row'>
  <div class='col-md-12'>
      <!-- Box -->
      <div class="box box-primary">
          <div class="box-header with-border">
              <h3 class="box-title">Markets Registered</h3>
              <div class="box-tools pull-right">
                  <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                  <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="vanaho"><i class="fa fa-times"></i></button>
              </div>
          </div>
          <div class="box-body">
          @if(!empty($products))
          <div class="table-responsive">
          <table class="table table-hover table-striped">
              <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Quantity Unity</th>
                <th>category Name</th>
                <th>Edit</th>
                <th>Delete</th>
              </tr>
               @foreach ($products as $product)
              <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->product_name }}</td>
                <td>{{ $product->quantity_unit }}</td>
                <td>category Name</td>
                <td>edit</td>
                <td><a href="delete?scope=product&id={{$product->id}}" class="btn btn-xs btn-block {{'btn-primary'}}">delete</a></td>
               </tr>
              @endforeach
            </table> 
            {!! $products->render() !!}
            </div>
            @else
            <div class="alert alert-success">No Markets Registered Yet!</div>
            @endif
          </div><!-- /.box-body -->
          <div class="box-footer">
          </div><!-- /.box-footer-->
      </div><!-- /.box -->
  </div><!-- /.col -->

</div><!-- /.row -->
@endsection