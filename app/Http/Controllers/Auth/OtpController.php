<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OtpController extends Controller
{
  public function index(Request $request){

    $username =$request->session()->get('username');;
    $email = $request->session()->get('email');

    return view("Auth.verifyemail", )->with("username", $username)->with("email", $email);
  }

  public function store(Request $request){

  
    return view("Auth.verifyemail");

  }







    
}
