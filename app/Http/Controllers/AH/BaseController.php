<?php

namespace App\Http\Controllers\AH;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class BaseController extends Controller
{
	
	public function viewAll()
	{
		return  view("main")->with('modul','AhItem');
	}
	public function logout(Request $request){
		
	}
}