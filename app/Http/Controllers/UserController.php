<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Validator;
use DB;


class UserController extends Controller{

  public function showAll(Request $request){
    Log::info('Display all users: ');
    $limit = $request->query('limit',3);
    $user_list = DB::select('select * from users limit ?',[$limit]);
    return response()->json($user_list, 200);
  }

public function show(Request $req, $user_id){
    Log::info('Displaying  users details of : '.$user_id);
    $user_list = DB::select('select * from users where uid = ?',[$user_id]);
    return response()->json($user_list, 201);
  }
	public function insert(Request $request){
    $user_name = $request->input('uname');
    $phone_num = $request->input('phone');
    $location = $request->input('location');
    $resp = DB::insert('insert into users (uname,phone,location) values (?,?,?)',[$user_name,$phone_num,$location]);
     Log::info('Inserted new user: ',.$user_name); 
    return response()->json($resp, 201);
  }
  public function edit(Request $request,$user_id){
    $phone = $request->input('phone');
    $location = $request->input('location');
    $resp = DB::update('update users set  phone = ?, location = ? where uid = ?',[$phone,$location,$user_id]);
    Log::info('Updated user details of: ',.$user_id); 
    return response()->json($resp, 201);
  }

  public function destroy($user_id) {
    DB::delete('delete from users where uid = ?',[$id]);
    Log::info('Deleted user : ',.$user_id); 
    echo "Record deleted successfully.<br/>";
  }
}
