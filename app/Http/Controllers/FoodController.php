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

  public function insert(Request $request) 
  {  
    $fnamee=$request->input('fname');
    $prc=$request->input('price');
    DB::insert('insert into food (fname,price) values(?,?)',[$fnamee,$prc]);
    echo "Record inserted successfully.<br/>";
  }

  public function show($id)
  {
    $foodd = DB::select('select * from food where fid = ?',[$id]);
    $res=json_encode($foodd,true);
    print_r($res);
   }

  public function edit(Request $request,$id) 
  {
    $name = $request->input('fname');
    $prc=$request->input('price');
    DB::update('update food set fname = ?, price=? where id = ?',[$name,$id,$prc]);
    echo "Record updated successfully.<br/>";
  }


   public function destroy(Request $request,$id) 
  {
    DB::delete('delete * from food where id = ?',[$id]);
    echo "Record deleted successfully.<br/>";
  }
} 
