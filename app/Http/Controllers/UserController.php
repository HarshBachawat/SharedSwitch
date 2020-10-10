<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Switchstate;
use App\User;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
        $this->middleware('role:user');
    }

	public function index() {
		$state = Switchstate::orderBy('created_at','desc')->first();
		return view('user.dashboard',compact('state'));
	}
}
