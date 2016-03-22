@extends('templates.default')
 @section('content')
         
                       @if(Auth::user()->check()) 
                       <div class="col-lg-3"></div>
                       <div class="col-lg-6" >
                    <div  class="table-responsive" style="overflow-x:auto;">
                     <table class="table">
                     <tbody align="center">
                      <tr>
                        <td>Last Name:</td>
                        <td>
                         {{ucfirst(Auth::user()->user()->personInfo->lastname)}}
                        <td>
                      </tr>
                      <tr>
                        <td>First Name:</td>
                        <td>
                          {{ucfirst(Auth::user()->user()->personInfo->firstname)}}
                        </td>
                      </tr>
                      <tr>
                        <td>ID Number:</td>
                        <td>
                          {{Auth::user()->user()->personInfo->idnumber}}
                        </td>
                      </tr>
                      <tr>
                        <td>Category:</td>
                        <td>
                          {{Auth::user()->user()->category->category_name}}
                        </td>
                      </tr>
                      <tr>
                        <td>Market:</td>
                        <td>
                           {{Auth::user()->user()->market->market_name}}
                        </td>
                      </tr>
                      </tbody>
                      </table>
                      
                      </div>
                        </div>
                         <div class="col-lg-4"></div>
                      @endif
                  {!!Form::close() !!}
 

@stop