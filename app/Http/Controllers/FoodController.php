<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\food;
use DB;


use App\Http\Requests;
use App\Http\Controllers\Controller;
class FoodController extends Controller
{
  
	public function index() 
  {
		$foodd = DB::select('select * from food');
		$res=json_encode($foodd,true);
		print_r($res);
	}

  public function insert($nm,$pr) 
  {  
    //print_r($request->input('fname'));
   // $prc=$request->input('price');Request $request
  // print_r("hello ".$nm." ".$pr);
    DB::insert('insert into food (fname,price) values(?,?)',[$nm,$pr]);
    echo "Record inserted successfully.<br/>";
  }

  public function show($id)
  {
    $foodd = DB::select('select * from food where fid = ?',[$id]);
    $res=json_encode($foodd,true);
    print_r($res);
   }

  public function edit($nm,$pr,$id) 
  {
   // $name = $request->input('fname');
   // $prc=$request->input('price');
    print_r("hello ".$nm." ".$pr);
   // DB::update('update food set fname = ?, price=? where id = ?',[$nm,$pr,$id]);
    //echo "Record updated successfully.<br/>";
  }


   public function destroy(Request $request,$id) 
  {
    DB::delete('delete * from food where id = ?',[$id]);
    echo "Record deleted successfully.<br/>";
  }
} 
