<?php

namespace App\Http\Controllers\Operator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
	public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-op')){
                return redirect('login/operator')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }

  	 function __invoke(){
    	return "ini lgin";
    }







}
