<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class Menu extends Controller
{
    public function index(){
        $menus = DB::table('menu')->select('c_id','c_title','c_is_show','c_type','c_main_id','ordering')->get();
        foreach($menus as $key => $menu)
            {
            	if($menu->c_title == "main_menu")
                $menus[$key]->c_title = "ទំព័រដើម";
            }
		return json_encode(array("Menu" => $menus), JSON_UNESCAPED_UNICODE);
    }
}
