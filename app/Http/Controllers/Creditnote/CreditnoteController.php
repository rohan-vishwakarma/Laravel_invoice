<?php

namespace App\Http\Controllers\Creditnote;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Creditnote as CreditnoteModel;
use Illuminate\Http\Request;

class CreditnoteController extends Controller
{
    
    public function index(){

        $invoice = Invoice::all()->where('user_id', session()->get('user_id'));

        return view('Creditnote.index', compact('invoice'));
    }


    public function store(string $id){

        $invoice = Invoice::all()->where('id', $id);

        $inv = Invoice::find($id);

        $creditnote = CreditnoteModel::where('invoiceno', $inv->invoiceno)
                                    ->where('user_id', session()->get('user_id'))
                                    ->first(['credit_no']);
        empty($creditnote) ? $creditno = 1 : $creditno = $creditnote + 1;   
        return view('Creditnote.create', compact('invoice', 'creditno'));

    }
  
}
