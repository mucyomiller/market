<?php

namespace App\Http\Controllers;
use App\Category;
use App\Province;
use App\District;
use App\Sector;
use App\User;
use App\Product;
use App\PersonInfo;
use App\Cell;
use App\Market;
use App\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
   public function search (){
   	$sectors= Sector::all(['id','sector_name']);
   	$districts=District::all(['id','district_name']);
    return view('clients.search')->with('sectors',$sectors)->with('districts',$districts);
   }
    public function look(Request $request)
    {
    	$sector_id=$request->input('category');
     $cells=Cell::where('sector_id',"=",$sector_id)->get();
     foreach ($cells as $cell) {
    $cell_ids[] = $cell->id;
      }
    $markets=Market::whereIn('cell_id',$cell_ids)->get();
     foreach ($markets as $market){
    $markets_ids[]=$market->id;
     }
    $prices=Price::whereIn('market_id',$markets_ids)->get();
   $sectors=Sector::where('id','=',$sector_id)->get();
 return view('reports.sector')->with('cells',$cells)->with('markets',$markets)->with('prices',$prices)->with('sectors',$sectors);
}

public function district(Request $request)
{
	$district_id=$request->input('district');
	$districts=District::where('id','=',$district_id)->get();
     $sectors=Sector::where('district_id',"=",$district_id)->get();
     foreach ($sectors as $sector){
      $sectors_ids[]=$sector->id;
     }
    $cells=Cell::whereIn('sector_id',$sectors_ids)->get();
   foreach ($cells as $cell) {
    $cells_ids[] = $cell->id;
      }
   $markets=Market::whereIn('cell_id',$cells_ids)->get();
     foreach ($markets as $market){
    $markets_ids[]=$market->id;
     }
     $prices=Price::whereIn('market_id',$markets_ids)->get();
return view('reports.district')->with('districts',$districts)->with('sectors', $sectors)->with('prices',$prices);

}

public function searchProduct(){
  return view('clients.productsearch');
}
public function results(Request $request){
     $this->validate ($request, [
          'product'=>'required|alpha',
       ]);
     $prod=$request->input('product');
  $products=Product::where('product_name','=', $prod)->get();
   if(isset($products)){
  foreach ($products as $product){
  $prices=Price::where('product_id','=',$product->id)->get();
    }
    if(isset($prices)){
return view('reports.product')->with('products',$products)->with('prices',$prices);
}
else
{
return view('reports.product')->with('products',$products)->with('info','NO price yet!');  
}
   }
   else
  return view('reports.product')->with('info','Product not in!!');  

}

}
 