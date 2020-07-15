<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\food;
use DB;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class FoodController extends Controller
{
	 public function showAll(Request $request){
    Log::info('Displayed all food items: ');
    $limit = $request->query('limit',3);
    try{
    $res = DB::select('select count(*) as total from food');
    Log::info('Total number of food items '.$res[0]->total);
    $foodd = DB::select('select * from food limit ?',[$limit]);
    }
    catch (\Exception $e){
    Log::critical('some error: '. print_r($e->getMessage(),true));
    Log::critical('error line: '. print_r($e->getLine(),true));
    return response()->json($foodd, 200);
    }
	}

  public function insert(Request $request) {
    $food_name = $request->input('fname');
    $food_price = $request->input('price');
    Log::info('Inserted new Food Item: ' .$food_name);   
    $resp = DB::insert('insert into food (fname,price) values(?,?)',[$food_name,$food_price]);
    return response()->json($resp, 201);
  }

  public function showOne(Request $request, $food_id){
    Log::info('Viewed Food Details: '.$food_id);   
    $foodd = DB::select('select * from food where fid = ?',[$food_id]);
    return response()->json($foodd, 201);
  }

  public function edit(Request $request, $food_id) {
    $food_name = $request->input('food_name');
    $food_price = $request->input('food_price');
    Log::info('Updated Food Item: '.$food_id);   
    $resp = DB::update('update food set fname = ?, price=? where fid = ?',[$food_name, $food_price, $food_id]);
    return response()->json($resp, 201);
  }

  public function deleteFood(Request $request, $food_id) {
    Log::info('Deleted Food Item: '.$food_id); 
    $resp = DB::delete('delete from food where fid = ?',[$food_id]);
    return response()->json($resp, 201);
  }
} 
