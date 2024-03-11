<?php

namespace App\Http\Controllers\Creditnote;
use Illuminate\Http\Response;


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

        $invoice = Invoice::where('id', $id)->first();
        $inv = Invoice::find($id);

        $creditnoterecords = CreditnoteModel::where('invoiceno', $invoice->invoiceno)->get();

        $creditnote = CreditnoteModel::where('user_id', session()->get('user_id'))
            ->max('credit_no');


        empty($creditnote) ? $creditno = 1 : $creditno = $creditnote + 1;

        return view('Creditnote.create', compact('invoice', 'creditno', 'creditnoterecords'));
    }


    public function add(Request $request)
    {
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
                    'remark' => 'required',
                    'customername' => 'required'
                ]);

                $creditNote = new CreditnoteModel();
                $creditNote->credit_date = $validatedData['credit_date'];
                $creditNote->customername = $validatedData['customername'];
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
                }else{
                    return redirect()->back()->with('error', 'Failed to save credit note.');
                }
                

            return redirect()->back()->with('success', 'Form submitted successfully!');

    }

    public function delete($id)
    {
        try {
           
            $creditnote = CreditnoteModel::findOrFail($id);
            $invoiceno = $creditnote->invoiceno;
            $user_id = $creditnote->user_id;
            $creditnoteamount = $creditnote->net_amount;


            DB::table('invoice')->where('user_id', $user_id)
                                ->where('invoiceno', $invoiceno)
                                ->increment('balance', $creditnoteamount);
            DB::table('invoice')->where('user_id', $user_id)
                                ->where('invoiceno', $invoiceno)
                                ->decrement('creditnote', $creditnoteamount);

            CreditnoteModel::destroy($id);            

            return response()->json(['message' => 'Credit note deleted successfully'], Response::HTTP_OK);
        } catch (\Throwable $th) {
            return response()->json(['error' => 'Something went wrong'], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
