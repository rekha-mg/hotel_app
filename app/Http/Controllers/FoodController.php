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
   public function sendResponse($result, $message,$response_code){
      $response = [
            'success' => true,
            'data'    => $result,
            'message' => $message,
                ];
        return response()->json($response, $response_code);
  }

	 public function showAll(Request $request){
    Log::info('Displayed all food items: ');
    $limit = $request->query('limit',3);
    try{
      $res = DB::select('select count(*) as total from food');
      Log::info('Total number of food items '.$res[0]->total);
      $total_food_items=$res[0]->total;
        if($total_food_items>$limit){
        $food_list = DB::select('select * from food limit ?',[$limit]);
      }else{
      $food_list = DB::select('select * from food');  
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
    return $this->sendResponse($food_list, 'request completed',200);
}
  
  public function insert(Request $request) {
    if ($request->has('fname') && $request->has('price')){
    $food_name = $request->input('fname');
    $food_price = $request->input('price');
    
    try{
      Log::info('Inserted new Food Item: ' .$food_name);   
      $resp = DB::insert('insert into food (fname,price) values(?,?)',[$food_name,$food_price]);
      }
      catch(\PDOException $pex){
      Log::critical('some error: '. print_r($pex->getMessage(),true)); //xampp off
      return $this->sendResponse("",'error related to database',500);
      }
      catch(\Exception $e)
      {
      Log::critical('some error: '. print_r($e->getMessage(),true));
      Log::critical('error line: '. print_r($e->getLine(),true));
      return $this->sendResponse("", 'some error in server',500); 
      }
    }
    else{
    Log::warning('input data missing'. print_r($request->input('fname'),true));
    return $this->sendResponse("", 'incorrect request',500); //wrong field name
    }
    return $this->sendResponse($resp, 'data insereted successfully',201);
  }

  public function showOne(Request $request, $food_id){
    if($food_id>0 && $food_id<=20){
      try{
        $food_detail = DB::select('select * from food where fid = ?',[$food_id]); 
        Log::info('Viewed Food Details: '.$food_id); 
       
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
      else
      {
        return $this->sendResponse("", 'some error in food id <20',500); 
      }
       return $this->sendResponse($food_detail, 'request completed',200);
   }

  public function edit(Request $request, $food_id) {
     
    if ($request->has('food_name') && $request->has('food_price')) {
      $food_name = $request->input('food_name');
      $food_price = $request->input('food_price');
      if($food_id>0 && $food_id<20)
      {
      try{
       $resp = DB::update('update food set fname = ?, price=? where fid = ?',[$food_name, $food_price, $food_id]);
              }
      catch(\PDOException $pex){
        Log::critical('some error: '. print_r($pex->getMessage(),true)); //xampp off
        return $this->sendResponse("",'error related to database',500);
        }
      catch (\Exception $e) {
        Log::critical('some error: '. print_r($e->getMessage(),true));
        Log::critical('error line: '. print_r($e->getLine(),true));
        return $this->sendResponse("", 'some error in server',500); 
      }
    }
    }else{
      return $this->sendResponse("", 'some error in input',500); 
    }
     Log::info('Updated Food Item: '.$food_id);  
     return $this->sendResponse($resp, 'data updated',200); 
    
  }

  public function deleteFood(Request $request, $food_id) {
    if($food_id>0 && $food_id<=20){
      try{
        Log::info('Deleted Food Item: '.$food_id); 
        $resp = DB::delete('delete from food where fid = ?',[$food_id]);
        
        }catch(\PDOException $pex){
        Log::critical('some error: '. print_r($pex->getMessage(),true)); //xampp off
        return $this->sendResponse("",'error related to database',500);
        }
        catch (\Exception $e) {
        Log::critical('some error: '. print_r($e->getMessage(),true));
        Log::critical('error line: '. print_r($e->getLine(),true));
        return $this->sendResponse("", 'some error in server',500); 
        }
      } else
        {
        return $this->sendResponse("", 'some error in input',500); 
        }
        return $this->sendResponse($resp, 'request completed',200);
     }
} 
