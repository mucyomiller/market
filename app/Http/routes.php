<?php
use Illuminate\Http\Request;
use App\District;
use App\Sector;
use App\Cell;
use App\Category;
use App\Market;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('enter', ['uses'=>'AdminController@index']);

/*
|--------------------------------------------------------------------------
| Image Routes
|--------------------------------------------------------------------------
|         here is where all image's route located 
|
*/

Route::get('image/{src}/{w?}/{h?}',function($src,$w=100,$h=100){
  //intervention image caching
  //closure and scoping anonymous function
  $cacheimage = Image::cache(function($image) use ($src,$w,$h){
    return $image->make("admin/dist/img/".$src)->resize($w,$h);
  }, 2, true);
  
  //dd($cachedimage);
  return Response::make($cacheimage,200,array('Content-Type'=>'image/png'));
});


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
|         here is where all user's route located 
|
*/


Route::get('getDistrict', function () {
   $prov_id=Input::get('prov_id');
   $district=District::where('province_id', '=', $prov_id)->get();
     return Response::json($district);

});
Route::get('getSector', function () {
   $distr_id=Input::get('distr_id');
   $sector=Sector::where('district_id', '=', $distr_id)->get();
     return Response::json($sector);

});

Route::get('getCell', function () {
    $sect_id=Input::get('sect_id');
    $cell=Cell::where('sector_id', '=', $sect_id)->get();
     return Response::json($cell);

});
Route::get('getMarket', function () {
   $cell_id=Input::get('cell_id');
   $mark=Market::where('cell_id', '=', $cell_id)->get();
     return Response::json($mark);

});

Route::get('index',
  ['uses'=>'UserController@index',
  'as'=>'index',
  ]);

Route::post('signup',
  ['uses'=>'UserController@signUp',
  'as'=>'signup',
   'middleware'=>['guest'],
  ]);
Route::post('signin',
  ['uses'=>'UserController@signIn',
  'as'=>'signin',
   'middleware'=>['guest'],
  ]);

Route::get('signout',
  ['uses'=>'UserController@signOut',
  'as'=>'signout',

  ]);

Route::post('save',
  ['uses'=>'UserController@savePrice',
  'as'=>'save',
  ]);
Route::get('price',
  ['uses'=>'UserController@priceRegistration',
  'as'=>'price',
  
  ]);
Route::get('authe',
  ['uses'=>'UserController@authenticated',
  'as'=>'authe',
]);

Route::get('profile',
  ['uses'=>'UserController@profile',
  'as'=>'profile',
  ]);
Route::get('contact',
  ['uses'=>'UserController@contact',
  'as'=>'contact',
  ]);



/*
|--------------------------------------------------------------------------
| Reports Routes
|--------------------------------------------------------------------------
|         here is where all Reports route located 
|
*/


Route::get('reports', ['uses'=>'ReportController@search', 'as'=>'reports']);
Route::post('sector', ['uses'=>'ReportController@look', 'as'=>'sector']);
Route::post('district', ['uses'=>'ReportController@district', 'as'=>'district']);
Route::get('/', ['uses'=>'ReportController@searchProduct', 'as'=>'search']);
Route::post('product', ['uses'=>'ReportController@results', 'as'=>'product']);
Route::post('send',
  ['uses'=>'UserController@sendMessage','as'=>'send']);



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|         here is where all Admin's route located 
|
*/
Route::group(['prefix'=>'admin','as' => 'admin.'], function () {

    Route::get('index', ['uses'=>'AdminController@index', 'as'=>'index']);
    Route::get('profile/{id}', ['uses'=>'AdminController@profile', 'as'=>'profile']);    
    Route::get('login', ['uses'=>'AdminController@getSignin', 'as'=>'login']);
    Route::get('logout', ['uses'=>'AdminController@logout', 'as'=>'logout']);
    Route::get('listuser', ['uses'=>'AdminController@listuser', 'as'=>'listuser']);
    Route::get('listcategory', ['uses'=>'AdminController@listcategory', 'as'=>'listcategory']);
    Route::get('listproducts', ['uses'=>'AdminController@listproducts', 'as'=>'listproducts']);
    Route::get('message', ['uses'=>'AdminController@getMessage', 'as'=>'message']);
    Route::get('readmessage', ['uses'=>'AdminController@readMessage', 'as'=>'readmessage']);
    Route::get('approve', ['uses'=>'AdminController@approveuser', 'as'=>'approveuser']);
    Route::get('delete', ['uses'=>'AdminController@delete', 'as'=>'delete']);
    Route::get('prices', ['uses'=>'AdminController@getprices', 'as'=>'prices']);
    Route::post('addcategory', ['uses'=>'AdminController@addcategory', 'as'=>'addcategory']);
    Route::post('addproduct', ['uses'=>'AdminController@addproduct', 'as'=>'addproduct']);
    Route::post('login', ['uses'=>'AdminController@postSignin', 'as'=>'login']);
    Route::post('upload',['uses'=>'AdminController@imageupload','as'=>'upload']);
    Route::get('test',function(){
      return view('admin.ok');
    });
});



/**
 *
 * Redis and nodejs route for socket.io
 */

Route::get('socket', 'SocketController@index');
Route::post('sendmessage', 'SocketController@sendMessage');
Route::get('writemessage', 'SocketController@writemessage');
