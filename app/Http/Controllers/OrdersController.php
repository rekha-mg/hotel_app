<?php
//$entityBody = file_get_contents('php://input');


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\food;
use DB;

class OrdersController extends Controller{  

  public function showAll(Request $request){
    $limit = $request->query('limit',3);
    $order_list = DB::select('select * from orders limit ?',[$limit]);
    return response()->json($order_list, 200);
  }

  public function showOne(Request $req, $order_id){
    $orders_list = DB::select('select * from orders where ordid = ?',[$order_id]);
    return response()->json($orders_list, 201);
  }

  public function insert(Request $request) {   
    $user_id = $request->input('user_id');
    $food_name = $request->input('food_name');
    $price =DB::select('select price from food where fname = ?',$food_name);

    $food_quantity = $request->input('food_quantity');
    $total_amt=$price*$food_quantity;
    $user_name=DB::select('select * from uname where uid = ?',[$user_id]);

    $resp = DB::insert('insert into orders values (uname,fname,quantity,price,amount) values (?, ? ,? ,? ,?)',[$user_name,$food_name,$food_name,$quantity,$price,$total_amt]);
    return response()->json($resp, 201);
  }
   

  public function edit(Request $request,$order_id){
    $food_name = $request->input('fname');
    $quantity = $request->input('$quantity');
    $res = DB::select('select price from food where fname = ?',[$food_name]);
    $res2 =json_encode($res);
   // print_r($res2);
    $requestObject=json_decode($res2,true);
   // $price=$requestObject["price"];
    $price = $requestObject[0]["price"];
    $total_amt = $quantity * $price;
    $resp = DB::update('update orders set  fname = ?, quantity = ?, price=?  , amount = ? where ordid = ?',[$food_name,$quantity,$price,$total_amt,$order_id]);
   return response()->json($resp, 201);
  }


   public function destroy($id) 
  {
    DB::delete('delete from orders where ordid = ?',[$id]);
    echo "Record deleted successfully.<br/>";
  }
}
