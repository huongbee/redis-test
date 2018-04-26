<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\RedisEvent;

class HomeController extends Controller
{
    
    function getHome(){
        return view('welcome');
    }

    function sendData(Request $req){
        // echo $req->_token;;
        // dd($req->all());
        //$redis = Redis::connection();
        event(
            $e = new RedisEvent($req->all())
        );
              
        return redirect()->back();
    }
}
