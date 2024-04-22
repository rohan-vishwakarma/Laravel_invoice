<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Customers;
use Illuminate\Http\Request;

class OutstandingController extends Controller
{
    
    function index(){
        $customers = Customers::pluck('name');
        $companyname = Company::pluck('companyname');
        return view('Reports.outstanding', compact('customers', 'companyname'));
    }

}
