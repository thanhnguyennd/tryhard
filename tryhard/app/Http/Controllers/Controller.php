<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function view($view_name, $arr_paramater = array()){
        $arr = array('hot_posts' => "1");
        if(isset($arr_paramater)){
            $arr = array_merge($arr,$arr_paramater);
        }

        return view($view_name, $arr);
    }
    function roleAdmin(){
        if(Auth::user()->role_name != "administrator"){
            Auth::logout();
            return false;
        }
        return  true;
    }
}
