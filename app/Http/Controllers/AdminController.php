<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ToggleSwitch;
use Auth;
use App\Switchstate;
use App\User;

class AdminController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    	$this->middleware('role:admin');
  	}
  
  	public function index() {
  		$state = Switchstate::orderBy('created_at','desc')->first();
  		// dd($state);
	    return view('admin.dashboard',compact('state'));
	}

	public function switch(Request $request) {
		$state = $request->input('state');
		$switchState = new Switchstate();
		$switchState->user_id = Auth::id();
		$switchState->state = $state;
		$switchState->save();
		broadcast(new ToggleSwitch($state))->toOthers();
		return response([$request->all()],200);
	}
}
