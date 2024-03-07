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
          <button onclick="window.location.href='/createinvoice'" class="btn btn-info">Create Invoice</button>
        </div>
        <div class="col-sm-8">
          
        </div>
      </div>
    </div>

        <form action="" method="post">
            <div class="container mt-4 " style="    border: 1px solid #d2c0c3;margin: auto;width: 90%;     border-radius: 7px;">

                <table>
                    <thead>
                            
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid;">
                            <td style="width: 20%;">INV NO:<input type="text" name="invoiceno" id="invoiceno" class="form-control form-control-sm"></td>
                            <td colspan="6" style="width: 80%;"></td>
                        </tr>
                        <tr>
                            <td>.</td>
                        </tr>
                        <tr>
                            <td >
                                <input type="text" name="customername" placeholder="customer name" id="customername" class="form-control form-control-sm">
                            </td>
                            <td colspan="4" style="width: 40%;"></td>
                            <td colspan="2"><input type="text" name="invoiceno" placeholder="company name" id="invoiceno" class="form-control form-control-sm"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="custadd" placeholder="customer address " id="custadd" class="form-control form-control-sm"></td>
                            <td colspan="4"></td>
                            <td colspan="2"><input type="text" name="address" placeholder="address " id="address" class="form-control form-control-sm"></td>
                        </tr>
                        <tr>
                            <td><input type="email" name="custemail" placeholder="custemail" id="custemail" class="form-control form-control-sm"></td>
                            <td colspan="4"></td>
                            <td colspan="2"><input type="text" name="email" placeholder="email" id="email" class="form-control form-control-sm"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="custgstin" placeholder="custgst in " id="custgstin" class="form-control form-control-sm"></td>
                            <td colspan="4"></td>
                            <td colspan="2"><input type="text" name="gstin" placeholder="gst in " id="gstin" class="form-control form-control-sm"></td>
                        </tr>

                    </tbody>
                </table>
            
            </div>
        </form>

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