<?php

namespace App\Http\Controllers\profile;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    

    public function index(Request $request){

        $session_var = session()->get("email");
        $users = User::where("email","=", $session_var)->first();

               
        return view("Profile.index")->with("users",$users);
    }


}
