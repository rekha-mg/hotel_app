<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\food;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
$responseObj = new stdClass();

class FoodController extends Controller
{
	 public function showAll(Request $request){
    $limit = $request->query('limit',3);
    $foodd = DB::select('select * from food limit ?',[$limit]);
    return response()->json($foodd, 200);
	}

  public function insert(Request $request) {   
    $food_name = $request->input('food_name');
    $food_price = $request->input('food_price');
    $resp = DB::insert('insert into food (fname,price) values(?,?)',[$food_name,$food_price]);
    return response()->json($resp, 201);
  }

  public function showOne(Request $request, $food_id){
    $foodd = DB::select('select * from food where fid = ?',[$food_id]);
    return response()->json($foodd, 201);
  }

  public function edit(Request $request, $food_id) {
    $food_name = $request->input('food_name');
    $food_price = $request->input('food_price');
    $resp = DB::update('update food set fname = ?, price=? where fid = ?',[$food_name, $food_price, $food_id]);
    return response()->json($resp, 201);
  }

  public function deleteFood(Request $request, $food_id) {
    $resp = DB::delete('delete from food where fid = ?',[$food_id]);
    return response()->json($resp, 201);
  }
} 
