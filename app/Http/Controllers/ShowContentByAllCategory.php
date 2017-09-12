<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class ShowContentByAllCategory extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrayFind = array("src=\"","\" alt=\"\"","\n","\r","&nbsp;");
        $arrayReplace = array("","","","","");

        $menuIds = DB::table('menu')->select('c_id','c_title')->distinct()->get();
        $result = array();
        foreach($menuIds as $menuId){
            if($menuId -> c_title == 'main_menu') continue;
            $contents = DB::table('content')->where('cat_id','=',$menuId->c_id)->orderBy('publish_date','DESC')->get();
            foreach($contents as $key => $content)
            {
                $contents[$key]->full_text = str_replace($arrayFind,$arrayReplace,strip_tags($content->full_text));
                $contents[$key]->media = "http://keiladaily.com/img/thumbs/" . $content->media;
            }
            $result = array_merge($result,array($menuId->c_title => $contents));
        }
        return json_encode(array("Content" => $result), JSON_UNESCAPED_UNICODE);
    }
    public function AmountContentOfEachCategory($amount)
    {
        $arrayFind = array("src=\"","\" alt=\"\"","\n","\r","&nbsp;");
        $arrayReplace = array("","","","","");

        $menuIds = DB::table('menu')->select('c_id','c_title')->distinct()->get();
        $result = array();
        foreach($menuIds as $menuId){
            if($menuId -> c_title == 'main_menu') continue;
            $contents = DB::table('content')->where('cat_id','=',$menuId->c_id)->orderBy('publish_date','DESC')->take($amount)->get();
            foreach($contents as $key => $content)
            {
                $contents[$key]->full_text = str_replace($arrayFind,$arrayReplace,strip_tags($content->full_text));
                $contents[$key]->media = "http://keiladaily.com/img/thumbs/" . $content->media;
            }
            $result = array_merge($result,array($menuId->c_title => $contents));
        }
        return json_encode(array("Content" => $result), JSON_UNESCAPED_UNICODE);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
