<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class OtpController extends Controller
{
  public function index(Request $request){

    $username =$request->session()->get('username');;
    $email = $request->session()->get('email');

    return view("Auth.verifyemail")->with("username", $username)->with("email", $email);
  }

  public function store(Request $request){

    $request->get("username");
    $request->get("email");
    $valid = $request->validate([
      "otp"=> "required",
    ]);

    if(empty( $valid)){

      $user = User::where('username', $request->get('username'))->first();
      print_r($user);
      echo "rohan";
      if($user){

        $otp = $user->otp;
        echo $otp;

      }

    }
    return view("Auth.verifyemail");

  }
    
}
