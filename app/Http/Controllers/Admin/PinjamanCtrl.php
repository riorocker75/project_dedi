<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PinjamanCtrl extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-adm')){
                return redirect('login/admin')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }




}
