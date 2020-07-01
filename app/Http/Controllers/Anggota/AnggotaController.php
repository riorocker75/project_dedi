<?php

namespace App\Http\Controllers\Anggota;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AnggotaController extends Controller
{
   public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if(!Session::get('login-ang')){
                return redirect('login/anggota')->with('alert-danger','Dilarang Masuk Terlarang');
            }
            return $next($request);
        });
        
    }

    function __invoke(){
    	return view('anggota.anggota');
    }


}
