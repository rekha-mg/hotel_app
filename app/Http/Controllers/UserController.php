<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\users;
use Validator;


class UserController extends Controller
{
    public function index()
    {
      $userr=users::all();
      		$userr=json_encode($userr,true);
		print_r($userr);
    }

public function insert(Request $request)
  {
    $input = $request->all();
        $validator = Validator::make($input, [
            'uname' => 'required',
            'phone' => 'required',
            'location' => 'required'
               ]);

         $customer = userr::create($input);
         print_r("inserted");
}
}
