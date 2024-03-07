<?php

namespace App\Http\Controllers\Invoice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Invoice extends Controller
{
    
    public function index()
    {
        
        return view("Invoice.index");
    }

    public function create()
    {
        return view("Invoice.create");
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
