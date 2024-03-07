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
          <button onclick="window.location.href='/addcustomers'" class="btn btn-info">ADD CUSTOMER</button>
        </div>
        <div class="col-sm-8">
          <table id="example" class="table table-striped" style="width:100%;     font-size: 12px;">
            <thead>
                <tr>
                    <th></th>
                    <th>Name</th>
                    <th>email</th>
                    <th>address</th>
                    <th>phone</th>
                    <th>gstin</th>
                </tr>
            </thead>
            <tbody>
              @foreach ($customers as $customer)
              <tr>
                  <th><i class="fa fa-user" style="color: orange;" aria-hidden="true"></i>
                  </th>
                  <td>{{ $customer->name }}</td>
                  <td>{{ $customer->email }}</td>
                  <td>{{ $customer->address }}</td>
                  <td>{{ $customer->contactno }}</td>
                  <td>{{ $customer->gstin }}</td>
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