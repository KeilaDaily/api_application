<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class ContentAll extends Controller
{
    public function index(){
    	$contents = DB::table('content')->orderBy('publish_date','DESC')->get();
        //-------------------- find replace string img -----------------
        $arrayFind = array("src=\"","\" alt=\"\"","\n","\r","&nbsp;");
        $arrayReplace = array("","","","","");
        
        foreach($contents as $key => $content)
        {
            $contents[$key]->full_text = str_replace($arrayFind,$arrayReplace,strip_tags($content->full_text));
            $contents[$key]->media = "http://keiladaily.com/img/thumbs/" . $content->media;
            
        }
        return json_encode(array("Content" => $contents), JSON_UNESCAPED_UNICODE);
    }


    public function ShowContentAmount($amount){
		$contents = DB::table('content')->orderBy('publish_date','DESC')->take($amount)->get();
        //-------------------- find replace string img -----------------
        $arrayFind = array("src=\"","\" alt=\"\"","\n","\r","&nbsp;");
        $arrayReplace = array("","","","","");

        foreach($contents as $key => $content)
        {
            $contents[$key]->full_text = str_replace($arrayFind,$arrayReplace,strip_tags($content->full_text));
            $contents[$key]->media = "http://keiladaily.com/img/thumbs/" . $content->media;
        }
        return json_encode(array("Content" => $contents), JSON_UNESCAPED_UNICODE);
		// return json_encode(array("Content" => array("Content" => $contents,"Content1" => $contents)), JSON_UNESCAPED_UNICODE);
    }


    public function ShowContentByCategory($catId, Request $request){
        //-------------------- amount from url -------------------------
        $amount = $request->input('amount');
        //-------------------- find replace string img -----------------
        $arrayFind = array("src=\"","\" alt=\"\"","\n","\r","&nbsp;");
        $arrayReplace = array("","","","","");

        if($amount === NULL) {
            $contents = DB::table('content')->where('cat_id','=',$catId)->orderBy('publish_date','DESC')->get();
        }
        else{
            $contents = DB::table('content')->where('cat_id','=',$catId)->orderBy('publish_date','DESC')->take($amount)->get();
        }
        foreach($contents as $key => $content)
        {
            $contents[$key]->full_text = str_replace($arrayFind,$arrayReplace,strip_tags($content->full_text));
            $contents[$key]->media = "http://keiladaily.com/img/thumbs/" . $content->media;
        }
        return json_encode(array("Content" => $contents), JSON_UNESCAPED_UNICODE);
    }


    public function ShowContentAmountById($newId){
        $contents = DB::table('content')->where('content.id','=',$newId)->join('menu','content.cat_id','=','menu.c_id')->first();
        $arrayFind = array("src=\"","\" alt=\"\"","\n","\r","&nbsp;");
        $arrayReplace = array("","","","","");
        $contents->full_text = str_replace($arrayFind,$arrayReplace,strip_tags($contents->full_text));
        $contents->media = "http://keiladaily.com/img/thumbs/" . $contents->media;
        return json_encode(array("Content" => $contents), JSON_UNESCAPED_UNICODE);
    }
}
