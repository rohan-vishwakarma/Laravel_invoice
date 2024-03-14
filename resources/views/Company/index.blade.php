@extends('Layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')

<style>
  input {
    border: 1px solid black !important;
    font-weight: 500  !important;
  }
  .alert{
    padding: 0;
    width: 50%;
    margin: auto;
    text-align: center;
  }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<main style="margin-top: 4%;">

    @include('Layouts.sidebar')



    <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">

    
    @if(session('success'))
    <div class="alert alert-info">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
<div class="alert alert-danger p-0">
    <ul><li>
        @foreach ($errors->all() as $error)
            {{ $error }}
        @endforeach
    </li></ul>
</div>
@endif


<form  method="post" action="/company" enctype="multipart/form-data">
  @csrf
    <div class="container">
        <h2 class="text-center mt-2" style="color: orange;font-family: fantasy;">
            <i class="fas fa-credit-card" style="color: #646968;margin-right: 23px;"></i>
COMPANY        </h2>

      <div class="row">

        <div class="col-sm-4">
            <div class="form-group">
                <label for="logo">Logo:</label>
                <input type="file" class="form-control form-control-sm" id="logo" name="logo">
                @error('logo')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            @if(isset($company) && $company->logo)
                <div>
                    <img src="data:image/png;base64,{{ base64_encode($company->logo) }}" alt="Company Logo" style="max-width: 100px; max-height: 100px;">
                </div>
            @endif
        </div>

        <div class="col-sm-4">
            <div class="form-group">
                <label for="logo">STAMP:</label>
                <input type="file" class="form-control form-control-sm" id="stamp" name="stamp">
                @error('stamp')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            @if(isset($company) && $company->stamp)
                <div>
                    <img src="data:image/png;base64,{{ base64_encode($company->stamp) }}" alt="Company Logo" style="max-width: 100px; max-height: 100px;">
                </div>
            @endif
        </div>
        
        

            <div class="col-sm-4">
                <label for="companyname">Company Name</label>
                <input type="text" class="form-control form-control-sm"  value="{{ old('companyname', $company->companyname ?? '') }}" id="companyname" name="companyname">
                @error('companyname')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-sm-4">
                <label for="billingname">Billing Name</label>
                <input type="text" class="form-control form-control-sm" value="{{ old('billingname', $company->billingname ?? '') }}" id="billingname" name="billingname">
                @error('billingname')
                        <div class="text-danger">{{ $message }}</div>
                @enderror        
            </div>
            <div class="col-sm-4">
                <label for="invoice_suffix">Invoice Suffix</label>
                <input type="text" class="form-control form-control-sm" value="{{ old('invoice_suffix', $company->invoice_suffix ?? '') }}" id="invoice_suffix" name="invoice_suffix">
                @error('invoice_suffix')
                        <div class="text-danger">{{ $message }}</div>
                @enderror        
            </div>
            <div class="col-sm-4">
                <label for="address">Address</label>
                <textarea type="text" class="form-control form-control-sm" id="address" value=""  name="address">{{ old('address', $company->address ?? '') }}
                </textarea>
            </div>
            <div class="col-sm-4">
                <label for="city">City</label>
                <input type="text" class="form-control form-control-sm" value="{{ old('city', $company->city ?? '') }}" id="city" name="city">
            </div>
            <div class="col-sm-4">
                <label for="state">State</label>
                <input type="text" class="form-control form-control-sm" value="{{ old('state', $company->state ?? '') }}" id="state" name="state">
            </div>
            <div class="col-sm-4">
                <label for="country">Country</label>
                <input type="text" class="form-control form-control-sm" value="{{ old('country', $company->country ?? '') }}" id="country" name="country">
            </div>
            <div class="col-sm-4">
                <label for="postal_code">Postal Code</label>
                <input type="text" class="form-control form-control-sm" value="{{ old('postal_code', $company->postal_code ?? '') }}" id="postal_code" name="postal_code">
            </div>
            <div class="col-sm-4">
                <label for="phone">Phone</label>
                <input type="text" class="form-control form-control-sm" id="phone" value="{{ old('phone', $company->phone ?? '') }}" name="phone">
            </div>
            <div class="col-sm-4">
                <label for="email">Email</label>
                <input type="email" class="form-control form-control-sm" value="{{ old('email', $company->email ?? '') }}" id="email" name="email">
            </div>
            <div class="col-sm-4">
                <label for="gstin">GSTIN</label>
                <input type="text" class="form-control form-control-sm" id="gstin" value="{{ old('gstin', $company->gstin ?? '') }}" name="gstin">
            </div>
            <div class="col-sm-4">
                <label for="currency">Currency</label>
                <input type="text" class="form-control form-control-sm" id="currency" value="{{ old('currency', $company->currency ?? '') }}" name="currency">
            </div>
            <div class="col-sm-4">
                <label for="payment_terms">Payment Terms</label>
                <textarea type="text" class="form-control form-control-sm" value="" id="payment_terms" name="payment_terms">{{ old('payment_terms', $company->terms_and_conditions ?? '') }}</textarea>
            </div>
            <div class="col-sm-4">
                <label for="billing_contact_name">Billing Contact Name</label>
                <input type="text" class="form-control form-control-sm" id="billing_contact_name" value="{{ old('billing_contact_name', $company->billing_contact_name ?? '') }}" name="billing_contact_name">
            </div>
            <div class="col-sm-4">
                <label for="billing_contact_email">Billing Contact Email</label>
                <input type="email" class="form-control form-control-sm" id="billing_contact_email" value="{{ old('billing_contact_email', $company->billing_contact_email ?? '') }}" name="billing_contact_email">
            </div>
            <div class="col-sm-4">
                <label for="billing_contact_phone">Billing Contact Phone</label>
                <input type="text" class="form-control form-control-sm" id="billing_contact_phone" value="{{ old('billing_contact_phone', $company->billing_contact_phone ?? '') }}"  name="billing_contact_phone">
            </div>
            <div class="col-sm-4">
                <label for="website">Website</label>
                <input type="text" class="form-control form-control-sm" id="website" value="{{ old('website', $company->website ?? '') }}" name="website">
            </div>
            <div class="col-sm-4">
                <label for="industry">Industry</label>
                <input type="text" class="form-control form-control-sm" id="industry" value="{{ old('industry', $company->industry ?? '') }}" name="industry">
            </div>
            <div class="col-sm-4">
                <label for="cgst_sgst">CGST-SGST</label>
                <input type="text" class="form-control form-control-sm" id="cgst_sgst" value="{{ old('cgst_sgst', $company->cgst_sgst ?? '') }}" name="cgst_sgst">
            </div>
            <div class="col-sm-4">
                <label for="igst">IGST</label>
                <input type="text" class="form-control form-control-sm" id="igst" value="{{ old('igst', $company->igst ?? '') }}" name="igst">
            </div>
            <div class="col-sm-4">
                <label for="bank_name">Bank Name</label>
                <input type="text" class="form-control form-control-sm" id="bank_name" value="{{ old('bank_name', $company->bank_name ?? '') }}" name="bank_name">
            </div>
            <div class="col-sm-4">
                <label for="bank_account_number">Bank Account Number</label>
                <input type="text" class="form-control form-control-sm" id="bank_account_number" value="{{ old('bank_account_number', $company->bank_account_number ?? '') }}" name="bank_account_number">
            </div>
            <div class="mt-4" style="margin: auto; width:50%">
              <button class="btn btn-info" type="submit">UPDATE</button>
            </div>
      </div>
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