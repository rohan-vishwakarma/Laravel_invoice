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
        <div class="d-flex flex-column outer align-items-stretch flex-shrink-0 break-page " style="width: 80%;">



            <div class="container-fluid outer break-page">
                <div class="row">
                    <table class="">
                        <thead>
                            

                            <tr>
                                <td colspan="8">
                                    <div style="    display: flex;">
                                        <div class="logo" style="width: 13%;">
                                            <img src="data:image/png;base64,{{ base64_encode($company->logo) }}" alt="Company Logo" style="width: -webkit-fill-available;object-fit: contain;">

                                        </div>
                                        <div class="middle" style="width: 74%; text-align: center;">
                                            <h4 style="margin: 0;">TAX INVOICE</h4>

                                        </div>
                                        <div class="print" style="width: 13%;">
                                            <img class="gif" src="/images/print.gif" alt="gif" onclick="printinvoice()" style="width: 50%">

                                        </div>
                                    </div>

                                </td>
                            </tr>
                            
                            
                        
                            <tr style="border-top: hidden; border-bottom: hidden">
                                <td colspan="8"><b>ADDRESS</b> : {{ $invoice->cadd }} <b>PINCODE: {{ $invoice->postal_code }}</b> </td>
                            </tr>
                            <tr style="border-top: hidden; border-bottom: hidden">
                                <td colspan="4"><b>PHONE NO</b>: {{ $company->phone }}</td>
                                <td colspan="4"><b>EMAIL</b>: {{ $invoice->cemail }}</td>
                            </tr>
                            <tr style="border-bottom: 1px solid ">
                                <td colspan="4"><b>PAN NO:</b></td>
                                <td colspan="4"><b>GSTIN</b>: {{ $invoice->cgstin }} </td>
                            </tr>

                            <tr style=" border-bottom: hidden">
                                <td colspan="4"><b>CUSTOMER NAME</b>: <span
                                        style="font-size: 15px;">{{ $invoice->customername }} </span></td>
                                <td colspan="4" style="border-left: 1px solid "><b>INVOICE NO :
                                        {{ $invoice->invoiceno }}  {{ $company->invoice_suffix }}</b></td>
                            </tr>

                            <tr style=" border-bottom: hidden">
                                <td colspan="4"><b>ADDRESS : </b>{{ $invoice->custadd }}  </td>
                                <td colspan="4" style="border-left: 1px solid "><b>DATE: {{ $invoice->invoicedate }}</b>
                                </td>
                            </tr>

                            <tr style="border-bottom: 1px solid">
                                <td colspan="3"><b>GSTIN :</b> {{ $invoice->custgstin }}  </td>
                                <td><b>HSN SAC</b></td>
                                <td colspan="4" style="border-left: 1px solid "></td>
                            </tr>
                            <tr style="border-bottom: 2px double">
                                <td style="width: 5%"><b>SRNO</b></td>
                                <td colspan="4" style="width: 40%"><b>DESCRIPTION</b></td>
                                <td style="width: 10%;"><b>QUANTITY</b></td>
                                <td style="width: 10%;"><b>RATE</b></td>
                                <td style="width: 10%;"><b>AMOUNT</b></td>
                            </tr>
                            @php $a = 1 @endphp
                            @foreach ($items as $item)
                                <tr style="    border: 1px solid;">
                                    <td><b>{{ $a }}</b></td>
                                    <td colspan="4">
                                        {{ $item->description }}
                                        <span style="display: block;"><b>Note</b> : {{ $item->note }}</span>
                                    </td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->rate }}</td>
                                    <td>{{ $item->amount }}</td>
                                </tr>
                                @php $a++ @endphp
                            @endforeach

                            <tr>
                                <td colspan="5"></td>
                                <td colspan="2" style="border-left: 1px solid;"><b>AMOUNT</b></td>
                                <td style="font-size: 14px;">{{ $invoice->amount }}</td>
                            </tr>
                            <tr>
                                <td colspan="5"></td>
                                <td colspan="2" style="border-left: 1px solid;"><b>TAX ({{ $invoice->tax }})</b></td>
                                <td style="font-size: 14px; ">{{ $invoice->taxamount }}</td>
                            </tr>
                            <tr style=" border-bottom: 1px solid">
                                <td colspan="5" style="font-size: 14px"> <b>Inwords :</b> {{ number_to_words($invoice->totalamount)  }} Only.</td>
                                <td colspan="2" style=" border-bottom: 1px solid;border-left: 1px solid;"><b>TOTAL AMOUNT:</b></td>
                                <td style="font-size: 14px;  border-bottom: 1px solid">{{ $invoice->totalamount }}</td>
                            </tr>
                            <tr>
                              <td colspan="6"></td>
                              <td colspan="2">
                                <img src="data:image/png;base64,{{ base64_encode($company->stamp) }}" alt="stamp"
                                        style="max-width: 100px; max-height: 100px;">
                              </td>
                            </tr>
                            <tr style="border-bottom: 1px solid;">
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

    <style>
        @media print {
    .navbar,
    .sidebar,
    .gif {
        display: none !important;
    }

    td {
        padding: 4px !important;
    }

    .outer, table {
        width: 98% !important;
        margin: auto !important;
    }

    .break-page {
        page-break-after: always;
    }

    @page {
        size: a4 portrait; /* Set the page size to auto */
        orphans: 0; /* Prevent orphans */
        widows: 0; /* Prevent widows */
    }
}


.middle , .print{
    width: 74%;
    text-align: center;
    display: flex;
    justify-content: center;
    align-items: center;
    height: auto; /* Ensures full height */
}

.middle h4 {
    margin: 0;
}



        @page{
            width: 100%;

            @top-right {
                content: "Page " counter(pageNumber);
            }

            table {
                display: none;
            }

            .container-fluid {
                page-break-after: always;
                break-after: page;
                }
        }

        @page wide {
        size: a4 portrait;
        }
    </style>

    <script>
        new DataTable('#example');
        
        function printinvoice(){
            window.print();
        }

    </script>
@endsection
