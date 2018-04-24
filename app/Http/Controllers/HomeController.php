<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            new \App\Events\Event($req->_token)
        );
              
        return redirect()->back();
    }
}
