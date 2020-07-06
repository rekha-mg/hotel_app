<?php

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

  public function insert(Request $request) 
  {  
    $usnm=$request->input('uname');
    $fnm=$request->input('fname');
    $qty=$request->input('qty');
    $amt=$request->input('amt');
    $prc=$request->input('price');
    DB::insert('insert into orders (uname,fname,quantity ,price,amount) values(?,?,?,?,?)',[$usnm,$fnm,$qty,$amt,$prc]);
    echo "Record inserted successfully.<br/>";
  }

  public function show($id)
  {
    $ord = DB::select('select * from orders where ordid = ?',[$id]);
    $res=json_encode($ord,true);
    print_r($res);
   }

  public function edit(Request $request,$id) 
  {
    $usnm=$request->input('uname');
    $fnm=$request->input('fname');
    $qty=$request->input('qty');
    $amt=$request->input('amt');
    $prc=$request->input('price');
    DB::update('update orders set uname = ?, fname = ?,quantity = ?, price=?  , amount = ? where id = ?',[$usnm,$fnm,$qty,$prc,$amt,$id]);
    echo "Record updated successfully.<br/>";
  }


   public function destroy(Request $request,$id) 
  {
    DB::delete('delete * from food where id = ?',[$id]);
    echo "Record deleted successfully.<br/>";
  }
}
