<?php

namespace App\Http\Controllers;
use App\Models\Customers as CustomersModel;
use Illuminate\Http\Request;
use SebastianBergmann\Type\TrueType;

class Dashboard extends Controller
{   

    public static function checksession(){

        if(session()->has("email")){
            return True;
        }
    }


    public function index(){

        $check = $this->checksession();
        if($check == false){
            return redirect("login")->withErrors("error","Please login");
        }

        $customerCount = CustomersModel::count();

        return view("dashboard", compact("customerCount"));
    }
}
