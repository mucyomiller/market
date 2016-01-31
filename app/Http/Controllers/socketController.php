<?php 
namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Request;
use Redis;

class socketController extends Controller
{
    public function __construct()
    {
    }
    public function index()
    {
        return view('socket');
    }
    public function writemessage()
    {
        return view('writemessage');
    }
    public function sendMessage()
    {
        $redis = Redis::connection();
        $redis->publish('message', Request::input('message'));
        return redirect('writemessage');
    }
}
