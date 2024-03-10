<?php

namespace App\Http\Controllers\Creditnote;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class CreditnoteController extends Controller
{
    
    public function index(){

        $invoice = Invoice::all()->where('user_id', session()->get('user_id'));
        return view('Creditnote.index', compact('invoice'));
    }


    public function store(string $id){

        $invoice = Invoice::all()->where('id', $id);

        return view('Creditnote.create', compact('invoice'));

    }
  
}
