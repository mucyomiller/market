<?php

namespace App\Http\Controllers;

use DB;
use App\Price;
use Illuminate\Support\Facades\Facade;
use Auth;
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
        return view('user.index', compact('provinces', $provinces))->with('categories', $categories);
    }

    public function categories()
    {
        return $categories= Category::all(['id', 'category_name']);
    }
    public function signUp(Request $request)
    {
        $this->validate($request, [
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
              'pin'=>'required|numeric|digits:5',
              'pin-validation'=>'required|numeric|digits:5|same:pin',

        ]);
  
        $new= DB::table('personinfos')->insertGetId([
       'first_name'=>$request->input('firstname'),
        'last_name'=>$request->input('lastname'),
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

        return redirect()->route('index')->with('info', 'Account created and You can now sign In.');
    }


    public function signIn(Request $request)
    {
        $this->validate($request, [
        'sign-in-phone'=>'required|numeric|digits:10',
        'sign-in-pin'=>'required',
      ]);
        $phone=$request->input('sign-in-phone');
        $pin=$request->input('sign-in-pin');
        if (Auth::user()->attempt(['phone'=>$phone, 'password'=>$pin], $request->has('remember'))) {
            if (((Auth::User()->status)==0)) {
                return view('user.approved');
            } else {
                return view('user.welcome');
            }
        }
        return redirect()->back()->with('info', 'can not sign you in');
    }
    public function priceRegistration()
    {
        $prod=Auth::user()->user()->category_id;
        $products=Product::where('category_id', '=', $prod)->get();
        return view('user.home', compact('products', $products));
    }

    public function signOut()
    {
        Auth::logout();
        return redirect()->route('index');
    }

    public function savePrice(Request $request)
    {
        $this->validate($request, [
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
        DB::table('points')->where('id', '=', Auth::user()->user()->id)->update(['points'=>$a+100]);
        return redirect()->back()->with('info', 'successful saved');
    }

    public function authenticated()
    {
        return view('user.authenticated');
    }

    public function profile()
    {
        return view('user.profile');
    }
}
