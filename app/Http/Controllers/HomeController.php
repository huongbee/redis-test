<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    function index(){
        event(
            new \App\Events\Event('huonghuonghuong')
        );
    }
}
