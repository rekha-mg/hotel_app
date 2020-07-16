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
    try{
      $res = DB::select('select count(*) as total from orders');
      Log::info('Total number of orders'.$res[0]->total);
      $total_orders=$res[0]->total;
      if($total_orders>$limit){
         $order_list = DB::select('select * from orders limit ?',[$limit]);
       }
      else{
         $order_list = DB::select('select * from orders');
      }
     }
      catch(\PDOException $pex){
      Log::critical('some error: '. print_r($pex->getMessage(),true)); //xampp off
      return $this->sendResponse("",'error related to database',500);
      }
      catch(\Exception $e){
      Log::critical('some error: '. print_r($e->getMessage(),true));
      Log::critical('error line: '. print_r($e->getLine(),true));
      return $this->sendResponse("", 'some error in server',500); 
      }
          return $this->sendResponse($order_list, 'request completed',200);
      
    }

  public function showOne(Request $req, $order_id){
    if($order_id>0 && $order_id<20){
      try{
        Log::info('Showing order of : '.$order_id);
        $orders_list = DB::select('select * from orders where ordid = ?',[$order_id]);
        } 
        catch(\PDOException $pex){
        Log::critical('some error: '. print_r($pex->getMessage(),true)); //xampp off
        return $this->sendResponse("",'error related to database',500);
        }
        catch(\Exception $e){
        Log::critical('some error: '. print_r($e->getMessage(),true));
        Log::critical('error line: '. print_r($e->getLine(),true));
        return $this->sendResponse("", 'some error in server',500);
        }
     }
        else{
        return $this->sendResponse("", 'some error in order_id',500);
        }  
         return $this->sendResponse($orders_list, 'request completed',200);
  }

  public function insert(Request $request) {  
   if ($request->has('uid') && $request->has('fname')) { 
    try{
        $user_id = $request->input('uid');
        $food_name = $request->input('fname');
        $res =DB::select('select price from food where fname = ?',[$food_name]);
        log::info('during editing got price: '.$food_name .'='.$res[0]->price );
        $price=$res[0]->price;
        $food_quantity = $request->input('quantity');
        $total_amt=$price * $food_quantity;
        $res_name=DB::select('select uname from users where uid = ?',[$user_id]);
        $user_name=$res_name[0]->uname;
        if(is_null($user_name)){
        log::info('user_id id does not exist: '.user_id );
        return $this->sendResponse($user_id, 'does not exist',500);
        } 
        else{
        $resp = DB::insert('insert into orders (uname,fname,quantity,price,amount) values (?, ? ,? ,? ,?)',[$user_name,$food_name,$food_quantity,$price,$total_amt]);
         log::info('orders edited by : '.$user_name);
        }
       
      }
        catch(\PDOException $pex){
        Log::critical('some error: '. print_r($pex->getMessage(),true)); //xampp off
        return $this->sendResponse("",'error related to database',500);
        }
        catch(\Exception $e){
        Log::critical('some error: '. print_r($e->getMessage(),true));
        Log::critical('error line: '. print_r($e->getLine(),true));
        log::info('during editing got price: '.$food_name .'='.$res[0]->price );
        }
     }  else{
        return $this->sendResponse("", 'some error in input',500);
        }  
        return $this->sendResponse($user_name, 'Ur order is placed',200);
   }

  public function edit(Request $request,$order_id){
    if ($request->has('fname') && $request->has('quantity')) {
      try{
        $food_name = $request->input('fname');
        $quantity = $request->input('quantity');
        $res = DB::select('select price from food where fname = ?',[$food_name]);
        $price = $res[0]->price;
        Log::info('got price of food : '.$res[0]->price);
        $total_amt = $quantity * $price;
        $resp = DB::update('update orders set  fname = ?, quantity = ?, price=?  , amount = ? where ordid = ?',[$food_name,$quantity,$price,$total_amt,$order_id]);
       } 
        catch(\PDOException $pex){
        Log::critical('some error: '. print_r($pex->getMessage(),true)); //xampp off
        return $this->sendResponse("",'error related to database',500);
        }catch (\Exception $e) {
        Log::critical('some error: '. print_r($e->getMessage(),true));
        Log::critical('error line: '. print_r($e->getLine(),true));
        return $this->sendResponse("", 'some error in server',500); 
        } 
       }
        else {
        Log::warning('input data missing'.print_r($request->all(), true));
        return $this->sendResponse("", 'fname or quantity missing',401); 
        }
        Log::info('updated order : '.$order_id);
        return $this->sendResponse("", 'updated successfully',201); 
  }

   public function destroy($order_id) {
    if($order_id>0 && $order_id<20){
      try{
        $res = DB::delete('delete from orders where ordid = ?',[$order_id]);
        }
        catch(\PDOException $pex){
        Log::critical('some error: '. print_r($pex->getMessage(),true)); //xampp off
        return $this->sendResponse("",'error related to database',500);
        }catch (\Exception $e) {
        Log::critical('some error: '. print_r($e->getMessage(),true));
        Log::critical('error line: '. print_r($e->getLine(),true));
        return $this->sendResponse("", 'some error in server',500); 
        } 
      }
      else{
        return $this->sendResponse("", 'incorrect order id',500); 
        }
        Log::info('deleted  order : '.$order_id);
        return $this->sendResponse("", 'deleted successfully',201); 
      }
}
