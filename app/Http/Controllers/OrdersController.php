<?php
//$entityBody = file_get_contents('php://input');


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\food;
use DB;
class OrdersController extends Controller
{  
 
    public function index() 
  {
		$ord = DB::select('select * from orders');
		$res=json_encode($ord,true);
		print_r($res);
	}

  public function insert($uid,$fnm,$qty) 
  {  
      $res=DB::select('select uname from users where uid= ?',[$uid]);
      $obj=json_encode($res,true); //echo $character->name 
      echo $obj;
      //$obj2 = json_decode($obj);
      //print_r($obj2->{'uname'}); // 

     // $amt=$qty*$prc;
      //$obj->['uname'];

// image_header
     
      //$amt=$qty*$pr;
    //DB::insert('insert into orders (uname,fname,quantity ,price,amount) values(?,?,?,?,?)',[$unm,$fnm,$qty,$prc,$amt]);
   // echo "Record inserted successfully.<br/>";
  }

  /*public function show($id)
  {
    $ord = DB::select('select * from orders where ordid = ?',[$id]);
    $res=json_encode($ord,true);
    print_r($res);
   }*/
  public function show(Request $req, $order_id){
   // $form_input= $req->all();
    //$query_input = $req->query();
    //$ord = DB::select('select * from orders where ordid = ?',[$id]);
    //$res=json_encode($ord,true);
    return response()->json($req->all(), 201);
  }

  public function edit($oid,$fname,$qty,$amt){
    $fnm=$fname;
    $qty=$qty;
    $amt=$amt;
    $prc=$qty*$amt;
    DB::update('update orders set  fname = ?,quantity = ?, price=?  , amount = ? where ordid = ?',[$fnm,$qty,$prc,$amt,$oid]);
    echo "Record updated successfully.<br/>";
  }


   public function destroy($id) 
  {
    DB::delete('delete from orders where ordid = ?',[$id]);
    echo "Record deleted successfully.<br/>";
  }
}
