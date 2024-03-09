@extends('Layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="/css/invoice.css">
    <main style="margin-top: 4%;">

        @include('Layouts.sidebar')


        <style>

        </style>
        <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">



            <div class="container outer">
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <td colspan="4">
                                    <img src="data:image/png;base64,{{ base64_encode($company->logo) }}" alt="Company Logo"
                                        style="max-width: 100px; max-height: 100px;">
                                </td>
                                <td colspan="4" style="text-align: left">
                                    <h3 class="header">{{ $company->companyname }}</h3>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8"><b>ADDRESS</b> : {{ $invoice->cadd }}</td>
                            </tr>
                            <tr>
                                <td colspan="4"><b>PHONE NO</b>: {{ $company->phone }}</td>
                                <td colspan="4"><b>EMAIL</b>: {{ $invoice->cemail }}</td>
                            </tr>
                            <tr style="border-bottom: 1px solid ">
                                <td colspan="4"><b>PAN NO:</b></td>
                                <td colspan="4"><b>GSTIN</b>: {{ $invoice->cgstin }} </td>
                            </tr>

                            <tr>
                                <td colspan="4"><b>CUSTOMER NAME</b>: <span
                                        style="font-size: 15px;">{{ $invoice->customername }} </span></td>
                                <td colspan="4" style="border-left: 1px solid "><b>INVOICE NO :
                                        {{ $invoice->invoiceno }}</b></td>
                            </tr>

                            <tr>
                                <td colspan="4"><b>ADDRESS</b></td>
                                <td colspan="4" style="border-left: 1px solid "><b>DATE: {{ $invoice->invoicedate }}</b>
                                </td>
                            </tr>

                            <tr style="border-bottom: 1px solid">
                                <td colspan="3"><b>GSTIN</b></td>
                                <td><b>HSN SAC</b></td>
                                <td colspan="4" style="border-left: 1px solid "></td>
                            </tr>
                            <tr>
                                <td><b>SRNO</b></td>
                                <td colspan="3"><b>DESCRIPTION</b></td>
                                <td><b>NOTE</b></td>
                                <td><b>QUANTITY</b></td>
                                <td><b>RATE</b></td>
                                <td><b>AMOUNT</b></td>
                            </tr>
                            @php $a = 1 @endphp
                            @foreach ($items as $item)
                                <tr>
                                    <td><b>{{ $a }}</b></td>
                                    <td colspan="3">{{ $item->description }}</td>
                                    <td>{{ $item->note }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->rate }}</td>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                                @php $a++ @endphp
                            @endforeach

                            <tr>
                                <td colspan="6"></td>
                                <td><b>AMOUNT</b></td>
                                <td style="font-size: 14px">12343</td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td><b>TAX ({{ $invoice->tax }})</b></td>
                                <td style="font-size: 14px">{{ $invoice->taxamount }}</td>
                            </tr>
                            <tr>
                                <td colspan="6"></td>
                                <td><b>TOTAL AMOUNT:</b></td>
                                <td>{{ $invoice->totalamount }}</td>
                            </tr>
                            <tr>
                              <td colspan="6"></td>
                              <td colspan="2">
                                <img src="data:image/png;base64,{{ base64_encode($company->stamp) }}" alt="Company Logo"
                                        style="max-width: 100px; max-height: 100px;">
                              </td>
                            </tr>
                            <tr>
                                <td colspan="8" style="text-align: center">TERMS & CONDITION :
                                    {{ $company->terms_and_conditions }}</td>
                            </tr>

                        </thead>
                        <tbody>

                        </tbody>
                    </table>
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
