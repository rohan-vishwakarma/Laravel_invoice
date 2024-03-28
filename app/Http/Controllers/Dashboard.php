<?php

namespace App\Http\Controllers;

use App\Models\Creditnote;
use App\Models\Customers as CustomersModel;
use App\Models\Invoice;
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
        $invoiceCount = Invoice::where('user_id', session()->get('user_id'))->count();

        $totaloverallamount = Invoice::where("user_id", session()->get('user_id'))
        ->sum("totalamount");

        $TodayinvoiceCount = Invoice::where('user_id', session()->get('user_id'))
        ->where("invoicedate", date('Y-m-d'))        
        ->count();

        $TotalInvoiceAmtOfToday = Invoice::where("invoicedate",  date('Y-m-d'))
        ->where("user_id", session()->get('user_id'))
        ->sum("totalamount");


        $totalCreditnote = Creditnote::where('user_id', session()->get('user_id'))
        ->count();

        $todaytotalCreditnote = Creditnote::where('user_id', session()->get('user_id'))
        ->where("credit_date", date('Y-m-d'))        
        ->count();

        $todaycreditamount = Creditnote::where('user_id', session()->get('user_id'))
        ->where("credit_date", date('Y-m-d'))        
        ->sum("net_amount");

        $totalcreditamount = Creditnote::where('user_id', session()->get('user_id'))
        ->sum("net_amount");

        return view("dashboard", compact("customerCount", 
        "invoiceCount", "TodayinvoiceCount","TotalInvoiceAmtOfToday", "totaloverallamount",
        "totalCreditnote", "todaytotalCreditnote", "totalcreditamount", "todaycreditamount"
    
        ));
    }
}
