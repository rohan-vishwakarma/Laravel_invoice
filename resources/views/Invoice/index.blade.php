@extends('Layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<main style="margin-top: 4%;">

    @include('Layouts.sidebar')


<style>
 
</style>
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">


    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          <button onclick="window.location.href='/createinvoice'" class="btn btn-info">Invoices</button>
        </div>
        <div class="col-sm-10">
          <table id="example" class="table table-striped" style="width:100%;       font-weight: 500;  font-size: 12px;">
            <thead style="    background: orange;">
                <tr>
                    <th></th>
                    <th style="    text-align: left;">Inv</th>
                    <th style="    text-align: left;">Name</th>
                    <th style="    text-align: left;">Amount</th>
                    <th style="    text-align: left;">Tax</th>
                    <th style="    text-align: left;">Total Amount</th>
                    <th style="    text-align: left;">Balance</th>
                    <th style="    text-align: left;">Payments</th>
                    <th style="    text-align: left;">View</th>
                </tr>
            </thead>
            <tbody>

                  @foreach ($invoice as $inv)
                    <tr>
                      <td><i class="fa fa-list-alt" aria-hidden="true" style="    color: slateblue;"></i>
                      </td>
                      <td style="    text-align: left;">{{$inv->invoiceno}}</td>
                      <td style="    text-align: left;">{{$inv->customername}}</td>
                      <td style="    text-align: left;">{{$inv->amount}}</td> 
                      <td style="    text-align: left;">{{$inv->taxamount}}</td>
                      <td style="    text-align: left;">{{$inv->totalamount}}</td> 
                      <td style="    text-align: left;">{{$inv->balance}}</td>
                      <td style="    text-align: left;"><i class="fa  fa-credit-card" style="color: steelblue;" aria-hidden="true"></i></td>
                      <td style="    text-align: left;"><a href="/invoices/show/{{$inv->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                    </tr>
                  @endforeach
              
            </tbody>
        </table>
        </div>
      </div>
    </div>


    </div>
  
  </main>


  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- Bootstrap Bundle (includes Popper) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">

<!-- DataTables Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

<script>
    	
      new DataTable('#example');
 </script>
      
@endsection