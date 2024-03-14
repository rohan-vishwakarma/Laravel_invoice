@extends('Layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')


<style>
    input {
        border: 1px solid black !important;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


<main style="margin-top: 4%;">

    @include('Layouts.sidebar')



    <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">


    <div class="container mt-3">

        <h2 class="text-center mt-2" style="color: orange;font-family: fantasy;">
            <i class="fas fa-credit-card" style="color: #646968;margin-right: 23px;"></i>
           ADD CUSTOMER
        </h2>

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
                <div class="col-sm-6" style="">


                    <div class="row">
                        <p>PERSONAL INFORMATION</p>
                        <div class="col-sm-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('name') }}" id="name" name="name" >        
                        </div>
                        <div class="col-sm-4">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control form-control-sm" value="{{ old('email') }}" id="email" name="email" >       
                        </div>
                        <div class="col-sm-4">
                            <label for="contactno" class="form-label">Contact   </label>
                            <input type="tel" class="form-control form-control-sm" value="{{ old('contactno') }}" id="contactno" name="contactno" >        
                        </div>
                    </div>



                </div>
                <div class="col-sm-6">
                    <div class="row">
                        <p>RESIDENTIAL INFORMATION</p>
                        <div class="col-sm-4">
                                <label for="address" class="form-label">Address 1 </label>
                                <input class="form-control form-control-sm" id="address" value="{{ old('address') }}" name="address" >
                        </div>
                        <div class="col-sm-4">
                            <label for="city" class="form-label">City</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('city') }}" id="city" name="city" >        
                        </div>
                        <div class="col-sm-4">
                            <label for="state" class="form-label">State</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('state') }}" id="state" name="state" >        
                        </div>
                        <div class="col-sm-4">
                            <label for="pincode" class="form-label">Pincode</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('pincode') }}" id="pincode" name="pincode" >        

                        </div>
                    </div>

                </div>

                <div class="col-sm-6">
                    <p>Accounts</p>
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="gstin" class="form-label">GSTIN</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('gstin') }}" id="gstin" name="gstin" >
                        </div>
                        <div class="col-sm-3">
                            <label for="gstin" class="form-label">GSTIN</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('gstin') }}" id="gstin" name="gstin" >
                        </div>
                        <div class="col-sm-3">
                            <label for="gstin" class="form-label">GSTIN</label>
                            <input type="text" class="form-control form-control-sm" value="{{ old('gstin') }}" id="gstin" name="gstin" >
                        </div>
                    </div>

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