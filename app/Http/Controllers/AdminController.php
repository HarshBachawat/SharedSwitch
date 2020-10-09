<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ToggleSwitch;

class AdminController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    	$this->middleware('role:admin');
  	}
  
  	public function index() {
	    return view('admin.dashboard');
	}

	public function switch(Request $request) {
		$state = $request->input('state');
		broadcast(new ToggleSwitch($state))->toOthers();
		return response([$request->all()],200);
	}
}
