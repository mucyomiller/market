@extends('templates.default')
 @section('content')
    <div class='row'>
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                 @foreach ($products as $product)
                    <center><h3 class="box-title">{{$product->product_name}}'s Prices</h3></center>
                  @endforeach
                     @if(!empty($prices))
                </div>
                <div class="box-body">
                <div class="table-responsive">
                <table class="table table-hover table-striped" border="2px" width="50%">
                  <tr>
                      <th>Markets</th>
                      <th>Price</th>
                  </tr>
                    @foreach ($prices as $price)
                    <tr>
                      <td>{{$price->market->market_name}}</td>
                      <td>{{$price->price}} Rwfs on {{$price->created_at->format('F j, Y')}}</td>
                    </tr>
                     @endforeach
             </table> 
                </div>
              </div>
            <div class="box-footer">
              </div>
            </div>
        </div>
         @else
      <div class="alert alert-success">No Records Yet!</div>
       @endif
  <input type="hidden" name="_token" value="{{Session::token()}}"></input>
{!!Form::close() !!}
    </div>
@endsection