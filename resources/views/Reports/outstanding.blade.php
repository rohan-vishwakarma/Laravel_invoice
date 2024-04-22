@extends('Layouts.master')
@section('title')
    USER PROFILE
@endsection

@section('content')
    <main class="container" style="margin-top: 5%">


    </main>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <main>

        @include('Layouts.sidebar')
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">
            <div class="container">
                <h2 class="text-center mt-2" style="color: orange;font-family: fantasy;">
                    <i class="fas fa-credit-card" style="color: #646968;margin-right: 23px;"></i>
                    OUTSTANDING REPORT
                </h2>
                <hr>
                <div class="row">

                    <div class="col-sm-3">
                        <label for="companyname">COMPANY</label>
                        <select type="text" name="companyname"  id="companyname" class="form-control form-control-sm">
                            @foreach ($companyname as $cmp)
                                <option value="{{$cmp}}">{{$cmp}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <label for="customername">CUSTOMER</label>
                        <select type="text" name="customername" placeholder="customer name" id="customername" class="form-control form-control-sm">
                            @foreach ($customers as $cust)
                                <option value="{{$cust}}">{{$cust}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="fromdate">From</label>
                        <input class="form-control form-control-sm" type="date" value="{{ date('Y-m-d') }}" name="fromdate" id="fromdate">
                    </div>

                    <div class="col-sm-2">
                        <label for="tilldate">Till</label>
                        <input  class="form-control form-control-sm" type="date" value="{{ date('Y-m-d') }}" name="tilldate" id="tilldate">
                    </div>
                    <div class="col-sm-2">
                        <label for="tilldate" style="display: block;visibility: hidden;">l</label>
                        <button type="submit" class="btn btn-info">SEARCH</button>
                    </div>
                </div>
            </div>
        </div>

    </main>

<style>
    input {
        font-weight: 500 !important;
    }
</style>
  
       
@endsection
@push('scripts')
<script src="js/outstanding.js"></script>
@endpush