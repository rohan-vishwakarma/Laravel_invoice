@extends('Layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')



  

<main style="margin-top: 4%;">

    @include('Layouts.sidebar')



    <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">


    <div class="container mt-3">

        <div>
            <h4 class="btn btn-info">ADD CUSTOMER</h4>
        </div>

        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <hr>
      <div class="row">

      <form method="POST" action="/addcustomers">
            @csrf
            <div class="row mb-3">
                <div class="col-sm-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control form-control-sm" value="{{ old('name') }}" id="name" name="name" >
                </div>
                <div class="col-sm-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control form-control-sm" value="{{ old('email') }}" id="email" name="email" >
                </div>
                <div class="col-sm-4">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control form-control-sm" id="address" value="{{ old('address') }}" name="address" ></textarea>
                </div>
                <div class="col-sm-4">
                    <label for="gstin" class="form-label">GSTIN</label>
                    <input type="text" class="form-control form-control-sm" value="{{ old('gstin') }}" id="gstin" name="gstin" >
                </div>
                <div class="col-sm-4">
                    <label for="contactno" class="form-label">Contact   </label>
                    <input type="tel" class="form-control form-control-sm" value="{{ old('contactno') }}" id="contactno" name="contactno" >
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


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