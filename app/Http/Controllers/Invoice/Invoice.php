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
        return view("Invoice.index");
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
+
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

                $invoice = InvoiceModel::select('invoiceno')->where('invoiceno', $invoiceno)->where('user_id' , $uid)->first();
                    
                    for ($i = 0; $i < count($description); $i++){
                        $items = Items::create([
                            'invoiceno' => $invoiceno,
                             'description'=> $description[$i],
                             'note' => $note[$i],
                             'quantity'=> $quantity[$i],
                             'rate'=> $rate[$i],
                             'amount'=> $amount[$i],
                            ]);
                        $items->save();
                    }
                    $invoice = InvoiceModel::create([
                        'invoiceno'=> $invoiceno,
                        'companyname'=>$companyname,
                        'cadd' => $cadd,
                        'cemail' => $cemail,
                        'cgstin' =>$cgstin,
                        'cuatomername'=>$custname,
                        'custadd'=>$custadd,
                        'custemail'=>$custemail,
                        'custgstin'=>$custgstin,
                        'amount' => $total,
                        'taxamount'=> $totaltax,
                        'totalamount'=> $grandtotal,
                        'user_id' =>  $uid
                    ]);
                    $invoice->save();
                    return redirect()->back()->with('success','Invoice Generated successfully');

        } catch (\Throwable $th) {
            throw $th;
        }

    }
    public function show(string $id)
    {
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }
    public function destroy(string $id)
    {
    }
}
