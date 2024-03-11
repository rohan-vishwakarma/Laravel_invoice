<?php

namespace App\Http\Controllers\Creditnote;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\Creditnote as CreditnoteModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;


class CreditnoteController extends Controller
{

    public function index()
    {

        $invoice = Invoice::all()->where('user_id', session()->get('user_id'));

        return view('Creditnote.index', compact('invoice'));
    }


    public function store(string $id)
    {

        $invoice = Invoice::all()->where('id', $id);

        $inv = Invoice::find($id);

        $creditnote = CreditnoteModel::where('invoiceno', $inv->invoiceno)
            ->where('user_id', session()->get('user_id'))
            ->first(['credit_no']);
        empty($creditnote) ? $creditno = 1 : $creditno = $creditnote->credit_no + 1;
        return view('Creditnote.create', compact('invoice', 'creditno'));
    }


    public function add(Request $request)
    {

        try {
                $validatedData = $request->validate([
                    'credit_date' => 'required',
                    'id' => 'required',
                    'invoiceno' => 'required',
                    'credit_no' => [
                        'required',
                        Rule::unique('creditnote')->where(function ($query) {
                            return $query->where('user_id', session()->get('user_id'));
                        })
                    ],
                    'on_account_received' => 'required|string',
                    'cgst' => 'required|integer',
                    'sgst' => 'required|integer',
                    'igst' => 'required|integer',
                    'net_amount' => 'required',
                    'remark' => 'required'
                ]);

                $creditNote = new CreditnoteModel();
                $creditNote->credit_date = $validatedData['credit_date'];
                $creditNote->invoice_id = $validatedData['id'];
                $creditNote->invoiceno = $validatedData['invoiceno'];
                $creditNote->credit_no = $validatedData['credit_no'];
                $creditNote->on_account_received = $validatedData['on_account_received'];
                $creditNote->cgst = $validatedData['cgst'];
                $creditNote->sgst = $validatedData['sgst'];
                $creditNote->igst = $validatedData['igst'];
                $creditNote->net_amount = $validatedData['net_amount'];
                $creditNote->remark = $validatedData['remark'];
                $creditNote->user_id = session()->get('user_id'); 
                
                if ($creditNote->save()) {
                    DB::table('invoice')
                        ->where('invoiceno', $validatedData['invoiceno'])
                        ->where('user_id',  session()->get('user_id'))
                        ->decrement('balance', $validatedData['net_amount']);
                
                    DB::table('invoice')
                        ->where('invoiceno', $validatedData['invoiceno'])
                        ->where('user_id',  session()->get('user_id'))
                        ->increment('creditnote', $validatedData['net_amount']);
                }
                

            return redirect()->back()->with('success', 'Form submitted successfully!');

        } catch (ValidationException $e) {

            dd($e);

        } catch (\Exception $e) {
            dd($e);
        }
    }
}
