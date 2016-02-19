@extends('templates.default')
 @section('content')
    <div class='row'>
        <div class='col-md-12'>
             <center><span class="alert alert-danger">When you find an empty space that means there is no record Yet!</span></center>
            <div class="box box-primary">
                <div class="box-header with-border">
                 @foreach ($districts as $district)
                    <center><h3 class="box-title">{{$district->district_name}}'s Reports on {{date("d-m-Y")}}</h3></center>
                  @endforeach
                     @if(!empty($sectors))
                </div>
                <div class="box-body">
                <div class="table-responsive">
                <table class="table table-hover table-striped" border="2px" >
                   <tr>
                   <th>PRODUCTS</th>
                   @foreach ($sectors as $id=>$sector)
                   <th>{{ $sector->sector_name}}</th>
                    @endforeach
                   </tr>
                     @foreach ($prices as $id=>$price)
                   <tr>
                   <td>{{$price->product->product_name}}</td>
                     @foreach ($sectors as $id=>$sector)
                     <td>{{$price->price}}</td>
                     @endforeach
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
      <div class="alert alert-success">No Reports Yet!</div>
       @endif
  <input type="hidden" name="_token" value="{{Session::token()}}"></input>
{!!Form::close() !!}
    </div>
@endsection