<?php
namespace App\Http\Controllers\Invoice;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Customers;
use App\Models\Items;
use Illuminate\Http\Request;
use App\Models\Invoice as InvoiceModel;
use App\Models\User as UserModel;



class Invoice extends Controller
{
    public function index()
    {       
        $uid =  session()->get('user_id');
        $invoice = InvoiceModel::all()->where('user_id', $uid);
        return view("Invoice.index", compact('invoice'));
    }
    public function create()
    {
        $uid =  session()->get('user_id');
        $select = InvoiceModel::where('user_id', $uid)->max('invoiceno');
        if(empty($select))
        {
            $invoiceno = 1;
        }
        else
        {
            $invoiceno = $select + 1;
        }
        $customers = Customers::pluck('name');  
        $company = Company::where('user_id', session()->get('user_id'))->first();
        return view("Invoice.create", compact('invoiceno', 'customers', 'company'));
    }

    public function store(Request $request)
    {
        try {
                $uid =  session()->get('user_id');
                $invoiceno = $request->input('invoiceno');
                $invoice_suffix = $request->input('invoice_suffix');
                $companyname = $request->input('companyname');
                $cadd = $request->input('address');
                $cemail = $request->input('email');
                $cgstin = $request->input('gstin');

                $custname = $request->input('customername');
                $custemail = $request->input('custemail');
                $custadd = $request->input('custadd');
                $custgstin = $request->input('custgstin');

                $description = $request->input('description');
                $quantity = $request->input('quantity');
                $rate = $request->input('rate');
                $note = $request->input('note');
                $amount = $request->input('amount');

                $total =  $request->input('total');
                $tax = $request->input('tax');
                $totaltax = $request->input('totaltax');
                $grandtotal = $request->input('grandtotal');
                $invoicedate = $request->input('invoicedate');

                $invoice = InvoiceModel::select('invoiceno')->where('invoiceno', $invoiceno)->where('user_id' , $uid)->first();
                    
                    for ($i = 0; $i < count($description); $i++){
                        $items = Items::create([
                            'invoiceno' => $invoiceno,
                             'description'=> $description[$i],
                             'note' => $note[$i],
                             'quantity'=> $quantity[$i],
                             'rate'=> $rate[$i],
                             'amount'=> $amount[$i],
                             'user_id'=> $uid
                            ]);
                        $items->save();
                    }
                    $invoice = InvoiceModel::create([
                        'invoiceno'=> $invoiceno,
                        'companyname'=> $companyname,
                        'invoicedate' => $invoicedate,
                        'invoice_suffix' => $invoice_suffix,
                        'cadd' => $cadd,
                        'cemail' => $cemail,
                        'cgstin' =>$cgstin,
                        'customername'=>$custname,
                        'custadd'=>$custadd,
                        'custemail'=>$custemail,
                        'custgstin'=>$custgstin,
                        'amount' => $total,
                        'tax' => $tax,
                        'taxamount'=> $totaltax,
                        'totalamount'=> $grandtotal,
                        'balance' => $grandtotal,
                        'user_id' =>  $uid
                    ]);
                    $invoice->save();
                    return redirect()->back()->withSuccess('Invoice Generated successfully');

        } catch (\Throwable $th) {
            throw $th;
        }

    }
    public function show(string $id)
    {   
        require_once(app_path('Helpers/NumberToWordsHelper.php'));
        
        $uid = session()->get('user_id');
        $company = Company::select('*')->where('user_id', $uid)->first();

        $invoice = InvoiceModel::findOrFail($id);
        $items = Items::select('*')->where('user_id', $uid)->where('invoiceno', $invoice->invoiceno)->get();
        return view('Invoice.show', compact('company', 'invoice', 'items'));
    }

    public function edit(string $id)
    {
    }
    public function update(Request $request, string $id)
    {
    }
    public function destroy(string $id)
    {       
        try {
            $invoice = InvoiceModel::findOrFail($id);
            $userid = $invoice->user_id;
            $invoiceno = $invoice->invoiceno;

            InvoiceModel::destroy($id);
            Items::where('user_id', $userid)
                ->where('invoiceno', $invoiceno)
                ->delete();   

            return response()->json(['message' => 'Invoice and associated items deleted successfully']);
        } catch (\Exception $e) {
            dd($e);
            return response()->json(['message' => 'Error deleting invoice and associated items: ' . $e->getMessage()], 500);
        }
    }

}
