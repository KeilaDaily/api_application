<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class Customer extends Controller
{
    public function index(){
        $customers = DB::table('customer')->get();
        /*foreach ($customers as $customer)
		{
		    echo var_dump($customer);
		}*/
		return json_encode(array("Customers" => $customers));;
    }
    public function create(){
    	echo 'create';
    }
    public function store(Requests $request){
    	echo 'store';
    }
    public function show($id){
    	echo 'show';
    }
    public function edit($id){
    	echo 'edit';
    }
    public function update($id){
    	echo 'update';
    }
    public function destory($id){
    	echo 'destory';
    }
}