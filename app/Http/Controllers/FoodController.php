<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\food;
use DB;


use App\Http\Requests;
use App\Http\Controllers\Controller;
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
    //$fidd=$request->input('fid');
    $fnamee=$request->input('fname');
    $prc=$request->input('price');
    DB::insert('insert into food (fname,price) values(?,?)',[$fnamee,$prc]);
    echo "Record inserted successfully.<br/>";
  }
} 
