<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use App\Models\Customers as CustomersModel;
use Illuminate\Http\Request;

class Customers extends Controller
{
    public function index(){
        
        $customers = CustomersModel::all();
        
        return view("Customers.index", ['customers' => $customers]);
    }


    public function create(){
        return view("Customers.create");
        
    }

    public function store(Request $request){
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:customers',
            'email' => 'required|email|unique:customers,email|unique:customers',
            'address' => 'required|string',
            'gstin' => 'required|string|max:15',
            'contactno' => 'required|string|max:15',
        ]);

        $create = CustomersModel::create([
            'name'=> $request->name,
            'email'=> $request->email,
            'address'=> $request->address,
            'gstin'=> $request->gstin,
            'contactno'=> $request->contactno,
        ]);
        return redirect()->route('customers')->with('success', 'Customer created successfully.');
    }
}
