@extends('Layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')



<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<main style="margin-top: 4%;">

    @include('Layouts.sidebar')



    <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">


    <div class="container">
      <div class="row">
        <div class="col-sm-2">
          <button onclick="window.location.href='/createinvoice'" class="btn btn-info">Invoices</button>
        </div>
        <div class="col-sm-8">
          <table id="example" class="table table-striped" style="width:100%;     font-size: 12px;">
            <thead>
                <tr>
                    <th></th>
                    <th>Inv</th>
                    <th>Name</th>
                    <th>Amount</th>
                    <th>Tax</th>
                    <th>Total Amount</th>
                </tr>
            </thead>
            <tbody>
              
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