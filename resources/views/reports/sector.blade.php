@extends('templates.default')
 @section('content')
    <div class='row'>
        <div class='col-md-12'>
             <center><span class="alert alert-danger">When you find an empty space that means there is no record Yet!</span></center>
            <div class="box box-primary">
                <div class="box-header with-border">
                 @foreach ($sectors as $sector)
                    <center><h3 class="box-title">{{$sector->sector_name}}'s Reports on {{date("d-m-Y")}}</h3></center>
                  @endforeach
                     @if(!empty($cells))
                </div>
                <div class="box-body">
                <div class="table-responsive">
                <table class="table table-hover table-striped" border="2px" >
                   <tr>
                   <th>Cells</th> 
                   <th>
                   <table width="100%">
                   <tr>
                      <th width="25%">Markets</th>
                      <th width="25%">Products</th>
                      <th width="25%">Prices</th>
                       <th width="25%">Dates</th>
                      </tr>
                      </table>
                      </th>
                      </tr>
                   @foreach ($cells as $id=>$cell)
                   <tr>
                     <td>{{ $cell->cell_name}}</td>
                     <td>
                       <table width="100%" border="2px">
                      @foreach ($markets as $id=>$market)
                      @if($cell->id==$market->cell_id)
                      <tr >
                      <td width="25%" style="padding-bottom:20px;">{{ $market->market_name}}</td>
                      <td width="25%" style="padding-bottom:20px;">
                      @foreach ($prices as $id=>$price)
                          @if($market->id==$price->market_id)
                          {{$price->product->product_name}}<br>
                          @endif
                          @endforeach
                          </td>
                          <td width="25%" style="padding-bottom:20px;">
                            @foreach ($prices as $id=>$price)
                                @if($market->id==$price->market_id)
                                   {{$price->price}}<br>
                                    @endif
                                   @endforeach
                          </td>
                          <td width="25%" style="padding-bottom:20px;">
                            @foreach ($prices as $id=>$price)
                                @if($market->id==$price->market_id)
                                   {{$price->current}}<br>
                                    @endif
                                   @endforeach
                          </td>
                      </tr>
                       @endif
                       @endforeach
                       </table>
                     </td>
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