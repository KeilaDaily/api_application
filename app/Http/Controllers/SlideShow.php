<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class SlideShow extends Controller
{
    public function index(){
        $slideShows = DB::table('slide')->get();
        foreach($slideShows as $key => $slideShow)
        {
            $slideShows[$key]->s_img = "http://keiladaily.com/img/slide/" . $slideShow->s_img;
        }
		return json_encode(array("SlideShow" => $slideShows), JSON_UNESCAPED_UNICODE);
    }
}
