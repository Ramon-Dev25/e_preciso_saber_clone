<?php

namespace App\Http\Controllers\Adm;

use App\Http\Controllers\Controller;
use App\Http\Libraries\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ControlPanelController extends Controller
{
    public function index () 
    {
        $user  = Auth::user();
        return view('adm.control_panel.index', compact('user'));
    }
}
