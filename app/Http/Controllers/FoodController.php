<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\food;
use DB;
class FoodController extends Controller
{
    //
    public function index() {
      $foodd = DB::select('select * from food');
  		$res=json_encode($foodd,true);
		print_r($res);
   }

     public function insert(Request $request) 
     {
      $fname = $request->input('fname');
      $prc=$request->input('price');
      $fid=$request->input('idd')
      DB::insert('insert into food (fid,fname,price) values(?,?,?)',[$fid,$fname,$prc]);
      echo "Record inserted successfully.<br/>";
      echo '<a href = "/insert">Click Here</a> to go back.';
   }
} 
