<?php

namespace App\Http\Controllers;
use DB;
Use App\Price;
use Illuminate\Support\Facades\Facade;
use Auth;
use App\Message;
use App\Point;
use App\Category;
use App\Province;
use App\District;
use App\Sector;
use App\User;
use App\Product;
use App\PersonInfo;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $c =new UserController;
      $categories =$c->categories();
    	$provinces = Province::all(['id', 'province_name']);
         return view('user.index',compact('provinces',$provinces))->with('categories',$categories);
         
    }

       public function categories()
    {
      return $categories= Category::all(['id','category_name']);
          
    } 
    public function signUp(Request $request)
    {
      $this->validate ($request, [
              'firstname'=>'required|alpha',
              'lastname'=>'required|alpha',
              'idnumber'=>'required|numeric|digits:16',
              'phone'=>'required|numeric|unique:users|digits:10',
              'province'=>'required',
              'district'=>'required',
              'sector'=>'required',
              'cell'=>'required',
              'market'=>'required',
              'category'=>'required',
              'pin'=>'required|numeric|digits:4',
              'pin-validation'=>'required|numeric|digits:5|same:pin',

        ]);
  
    $new= DB::table('personinfos')->insertGetId([
       'firstname'=>$request->input('firstname'),
        'lastname'=>$request->input('lastname'),
        'idnumber'=>$request->input('idnumber'),

      ]);
     $id=DB::table('users')->insertGetId([
      'phone'=>$request->input('phone'),
      'password'=>bcrypt($request->input('pin')),
      'personinfo_id'=>$new,
      'market_id'=>$request->input('market'),
      'category_id'=>$request->input('category'),
      'status'=>0,
      ]);
    Point::create([
       'user_id'=>$id,
       'points'=>10,
      ]);

     return redirect()->route('index')->with('info','Account created and You can now sign In.');
    }


    public function signIn(Request $request){
     
     $this->validate($request,[
        'sign-in-phone'=>'required',
        'sign-in-pin'=>'required',
      ]);
       $phone=$request->input('sign-in-phone');
       $pin=$request->input('sign-in-pin');
      if (Auth::user()->attempt(['phone'=>$phone,'password'=>$pin],$request->has('remember'))) {
         if(((Auth::User()->status)==0))
                return view('user.approved');
          else
                      return view('user.welcome');
      }
      return redirect ()->back()->with('info','can not sign you in');  
      
     
    }
    public function priceRegistration(){
       $prod=Auth::user()->user()->category_id;
           $products=Product::where('category_id','=',$prod)->get();
         return view('user.home',compact('products',$products));
    }

    public function signOut(){
      Auth::logout();
      return redirect()->route('index');
    }

  public function savePrice(Request $request){
    $results=Price::where('product_id','=',$request->input('product'))->where('user_id','=',Auth::user()->user()->id)->whereDate('current', '=', Carbon::today())->get();
   // $results=array_filter($results);
   // dd($results);
    if($results->first()){
     return view('user.registered');
   }
   else{
    $this->validate ($request,[
      'product'=>'required',
     'price'=>'required|numeric',
      ]);
     Price::create([
      'market_id'=>Auth::user()->user()->market_id,
      'product_id'=>$request->input('product'),
       'current'=>date("Y-m-d h:i:sa"),
        'price'=>$request->input('price'),
        'user_id'=>Auth::user()->user()->id,
      ]);
     $a=Auth::user()->user()->point->points;
     DB::table('points')->where('user_id','=',Auth::user()->user()->id)->update(['points'=>$a+100]);
          return redirect()->back()->with('info','successful saved');
   }
  }

  public function authenticated(){
   return view('user.authenticated');
  }

   public function profile(){
   return view('user.profile');
  }
  
  public function contact(){
    return view ('user.contact');
  }
  public function sendMessage(Request $request){
   $this->validate ($request,[
      'subject'=>'required',
      'message'=>'required',
      ]);

   Message::create([
     'user_id'=>Auth::user()->user()->id,
     'subject'=>$request->input('subject'),
     'message'=>$request->input('message'),
    ]);
    return redirect ()->back()->with('info','Message sent Successfully');
  }
}