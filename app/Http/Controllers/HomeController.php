<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Cookie;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->isAdministrator()){
            return redirect()->route('admin');
        }else{
            if(\Cache::get('invitacion')){
                $token = \Cache::get('invitacion');
                \Cache::forget('invitacion');
                return redirect()->route('group.add', $token);
            }else{
                return view('user.dashboard');  
            }           
        }
    }
}
