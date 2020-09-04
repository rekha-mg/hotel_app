<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SessionController extends Controller {
   public function accessSessionData(Request $request) {
      if($request->session()->has('uname'))
         
         echo $request->session()->get('uname');
      else
         echo 'No data in the session';
   }
   public function storeSessionData(Request $request) {
       
      $request->session()->put('uname','Virat Gandhi');
      echo "Data has been added to session";
   }
   public function deleteSessionData(Request $request) {
      $request->session()->forget('uname');
      echo "Data has been removed from session.";
   }
   public function getData(Request $require ){
      $data=$request->input('uname');
      $request->session()->put('uname',$data);
   echo $request->session()->get('uname');
   }
}