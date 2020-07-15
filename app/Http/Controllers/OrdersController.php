<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\food;
use DB;

class OrdersController extends Controller{  

  public function sendResponse($result, $message,$response_code){
      $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
                ];
        return response()->json($response, $response_code);
  }

  public function showAll(Request $request){
    Log::info('Display all orders: ');
    $limit = $request->query('limit',3);

    $order_list = DB::select('select * from orders limit ?',[$limit]);
    return $this->sendResponse($order_list, 'request completed',200);
    }

  public function showOne(Request $req, $order_id){
    Log::info('Showing order of : '.$order_id);
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
    Log::debug(print_r($request->all(), true));
    Log::info('editing of order : '.$order_id);
    if ($request->has('fname') && $request->has('quantity')) {
      $food_name = $request->input('fname');
      $quantity = $request->input('quantity');

      try{
        $res = DB::select('select price from food where fname = ?',[$food_name]);
        $price = $res[0]->price;
        Log::info('got price of food : '.$res[0]->price);
        $total_amt = $quantity * $price;
        $resp = DB::update('update orders set  fname = ?, quantity = ?, price=?  , amount = ? where ordid = ?',[$food_name,$quantity,$price,$total_amt,$order_id]);
          return response()->json($resp, 201);
        } catch (\Exception $e) {
        Log::critical('some error: '. print_r($e->getMessage(),true));
        Log::critical('error line: '. print_r($e->getLine(),true));
        return $this->sendResponse("", 'some error in server',500); 
            
        } 
      
    } else {
      Log::warning('input data missing'.print_r($request->all(), true));
      return $this->sendResponse("", 'fname or quantity missing',401); 
    }
    
  }

   public function destroy($order_id) {
    Log::info('deleted  order : '.$order_id);
    DB::delete('delete from orders where ordid = ?',[$order_id]);
     echo "Record deleted successfully.<br/>";
  }
}
