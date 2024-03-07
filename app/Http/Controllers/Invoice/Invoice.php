<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use App\Models\Invoice as InvoiceModel;
use App\Models\User as UserModel;


class Invoice extends Controller
{
    
    public function index()
    {   
        return view("Invoice.index");
    }

    public function create()
    {
        $uid =  session()->get('user_id');

        $select = InvoiceModel::where('user_id', $uid)->max('invoiceno');
        if(empty($select)){
            $invoiceno = 1;
        }
        else{
            $invoiceno = $select + 1;
        }
        $customers = Customers::pluck('name');  
        $company = UserModel::where('id', session()->get('user_id'))->first();

        return view("Invoice.create", compact('invoiceno', 'customers', 'company'));
    }

    public function store(Request $request)
    {
        
    }
    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }
    public function destroy(string $id)
    {
        //
    }
}
