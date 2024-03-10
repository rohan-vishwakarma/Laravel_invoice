<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Company;
use App\Models\User;

class CompanyController extends Controller
{       


    public function index(){
        $company = Company::where("user_id",session()->get("user_id") )->first();
        
        return view("Company.index", compact("company"));
    }
    

    public function update(Request $request)
    {   
        $user_id = session()->get("user_id");
    
        $request->validate([
            'companyname' => 'required|string|max:255',
            'billingname' => 'required|string|max:255',
            'address' => 'nullable|string',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'postal_code' => 'nullable|string|max:20',
            'phone' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'gstin' => 'nullable|string|max:15',
            'currency' => 'nullable|string|max:10',
            'payment_terms' => 'nullable|string|max:255',
            'billing_contact_name' => 'nullable|string|max:255',
            'invoice_suffix' => 'nullable|string|max:1000',
            'billing_contact_email' => 'nullable|email|max:255',
            'billing_contact_phone' => 'nullable|string|max:20',
            'website' => 'nullable|string|max:255',
            'industry' => 'nullable|string|max:255',
            'cgst_sgst' => 'nullable|numeric',
            'igst' => 'nullable|numeric',
            'bank_name' => 'nullable|string|max:255',
            'bank_account_number' => 'nullable|string|max:50',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Validate image upload
            'stamp' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $company = Company::where('user_id', $user_id)->first();

        if (!$company) {
            return redirect()->back()->with('error', 'Company not found.');
        }

        $company->companyname = $request->companyname;
        $company->billingname = $request->billingname;
        $company->address = $request->address;
        $company->city = $request->city;
        $company->state = $request->state;
        $company->country = $request->country;
        $company->postal_code = $request->postal_code;
        $company->phone = $request->phone;
        $company->email = $request->email;
        $company->gstin = $request->gstin;
        $company->currency = $request->currency;
        $company->payment_terms = $request->payment_terms;
        $company->billing_contact_name = $request->billing_contact_name;
        $company->billing_contact_email = $request->billing_contact_email;
        $company->billing_contact_phone = $request->billing_contact_phone;
        $company->website = $request->website;
        $company->industry = $request->industry;
        $company->cgst_sgst = $request->cgst_sgst;
        $company->igst = $request->igst;
        $company->bank_name = $request->bank_name;
        $company->bank_account_number = $request->bank_account_number;
        $company->invoice_suffix = $request->invoice_suffix;
        if ($request->hasFile('logo')) {
            $logo = file_get_contents($request->file('logo'));
            $company->logo = $logo;
        }
        if ($request->hasFile('stamp')) {
            $logo = file_get_contents($request->file('stamp'));
            $company->stamp = $logo;
        }
        $company->save();
        return redirect()->back()->with('success', 'Company updated successfully.');
    }

}   
