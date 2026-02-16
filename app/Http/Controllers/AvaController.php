<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AvaController extends Controller
{
    public function index () 
    {
        return view('ava_platform.index');
    }
    
    public function activities () 
    {
        return view('ava_platform.myClass.activities');
    }
    
    public function liveClass () 
    {
        return view('ava_platform.myClass.liveClass');
    }
    
    public function liveClassVideo () 
    {
        return view('ava_platform.myClass.liveClassVideo');
    }

}
