@extends('Layouts.master')
@section('title')
    Credit note
@endsection

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/cdn/ALertify/alertify.min.css">


    <style>
        label {
            font-size: 12px !important;
            font-weight: 500
        }
    </style>

    <main style="margin-top: 4%;">



        @include('Layouts.sidebar')

        <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">
            <div class="d-flex">
                <div style="width: 40%">
                    <a href="/creditnote" style="text-decoration: none"><i class="fa fa-arrow-left"
                            style="font-size: 30px; margin-left: 20px" aria-hidden="true"></i>Back to Credit note</a>
                </div>
                <div style="width: 50%;     font-size: 25px;"><i class="fas fa-credit-card"
                        style="color: orange;margin-right: 23px;"></i>CREDIT NOTE</div>
            </div>
            <form action="/creditnote/add" method="post">
                @csrf

                <hr>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <table id="example" class="table table-striped"
                                style="width:100%;       font-weight: 500;  font-size: 12px;">
                                <thead style="background: white;">
                                    <tr>
                                        <th></th>
                                        <th style="text-align: left;">Inv</th>
                                        <th style="text-align: left;">Customer Name</th>
                                        <th style="text-align: left;">Amount</th>
                                        <th style="text-align: left;">Tax</th>
                                        <th style="text-align: left;">Total Amount</th>
                                        <th style="text-align: left;">Credit Amount</th>
                                        <th style="text-align: left;">Balance</th>
                                        <th style="text-align: left;">Payments</th>
                                        <th style="text-align: left;">View</th>

                                    </tr>
                                </thead>
                                <tbody>

                              
                                        <tr>
                                            <td><i class="fa fa-list-alt" aria-hidden="true" style="    color: slateblue;">
                                                    <input type="text" value="{{ $invoice->id }}" name="id" hidden
                                                        id="id">
                                                </i>
                                            </td>
                                            <td style="text-align: left; width: 10%"> <input type="text"
                                                    style="width: 80%; font-weight: 500; border: hidden" name="invoiceno"
                                                    step="5" value="{{ $invoice->invoiceno}}"
                                                    id="invoiceno" readonly></td>
                                            <td style="text-align: left;">
                                                <input type="text" name="customername" style="border: none" value="{{ $invoice->customername }}" id="customername" readonly>
                                            </td>
                                            <td style="text-align: left;">{{ $invoice->amount }}</td>
                                            <td style="text-align: left;">{{ $invoice->taxamount }}</td>
                                            <td style="text-align: left;">{{ $invoice->totalamount }}</td>
                                            <td style="text-align: left;">
                                                {{ $invoice->creditnote ?? '0' }}
                                            </td>
                                            <td style="text-align: left;" class="balance">{{ $invoice->balance }}</td>
                                            <td style="text-align: left;">
                                                <a href="/creditnote/store/{{ $invoice->id }}">
                                                    <i class="fa  fa-credit-card" style="color: steelblue;"
                                                        aria-hidden="true"></i>
                                                </a>
                                            </td>
                                            <td style="text-align: left;"><a href="/invoices/show/{{ $invoice->id }}"><i
                                                        class="fa fa-eye" aria-hidden="true"></i></a></td>

                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <table id="example2" class="table table-striped"
                            style="width:80%; margin: auto;      font-weight: 500;  font-size: 12px;">
                            <thead style="background: #75d7da;">
                                <tr>
                                    <th></th>
                                    <th style="text-align: left;">Credit no</th>
                                    <th style="text-align: left;">Credit date</th>
                                    <th style="text-align: left;">Customer Name</th>
                                    <th style="text-align: left;">On account</th>
                                    <th style="text-align: left;">Tax amount</th>                               
                                    <th style="text-align: left;">Total</th>
                                    <th style="text-align: left;">View</th>

                                </tr>
                            </thead>
                            <tbody>
                                

                                @foreach ($creditnoterecords as $cd)
                                    <tr>
                                        <td><i class="fa fa-list-alt" aria-hidden="true" style="    color: slateblue;"></i>
                                        </td>
                                        <td style="text-align: left;">{{ $cd->credit_no }}</td>
                                        <td style="text-align: left;">{{ date('d M Y', strtotime($cd->credit_date)) }}</td>
                                        <td style="text-align: left;">{{ $cd->customername }}</td>
                                        <td style="text-align: left;">{{ $cd->on_account_received }}</td>
                                        <td style="text-align: left;">{{ $cd->cgst + $cd->sgst + $cd->igst  }}</td>
                                        <td style="text-align: left;">{{ $cd->net_amount }}</td>
                            
                                        <td style="text-align: left;">
                                            <button type="button" style="padding: 0; border: none" onclick="confirmDelete({{$cd->id}})">
                                                <i class="fa  fa-trash" style="color: steelblue;"
                                                    aria-hidden="true"></i>
                                            </button>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <div class="row justify-content-center">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <label for="credit_date" class="form-label">Date</label>
                                                <input type="date" class="form-control form-control-sm"
                                                    value="{{ date('Y-m-d') }}" id="credit_date" name="credit_date">
                                            </div>
                                            <div class="col-sm-1">
                                                <label for="credit_no" class="form-label">Credit no</label>
                                                <input type="text" class="form-control form-control-sm"
                                                    style="color: black; font-weight: 500" value="{{ $creditno }}"
                                                    id="credit_no" name="credit_no">
                                            </div>

                                            <div class="col-sm-2">
                                                <label for="on_account_received" class="form-label">On Account
                                                    Received</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    value="{{ old('on_account_received') }}" id="on_account_received"
                                                    name="on_account_received">
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="cgst" class="form-label">CGST</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    value="{{ old('cgst') ? old('cgst') : 0 }}" id="cgst"
                                                    name="cgst">
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="sgst" class="form-label">SGST</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    value="{{ old('sgst') ? old('sgst') : 0 }}" id="sgst"
                                                    name="sgst">
                                            </div>
                                            <div class="col-sm-2">
                                                <label for="igst" class="form-label">IGST</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    value="{{ old('igst') ? old('igst') : 0 }}" id="igst" name="igst">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-sm-3">
                                                <label for="net_amount" class="form-label">Net Amount</label>
                                                <input type="number" class="form-control form-control-sm"
                                                    id="net_amount"
                                                    value="{{ old('net_amount') ? old('net_amount') : 0 }}"
                                                    name="net_amount" readonly>
                                            </div>
                                            <div class="col-sm-5">
                                                <label for="remark" class="form-label">Remark</label>
                                                <input class="form-control form-control-sm" id="remark"
                                                    value="{{ old('remark') }}" name="remark">
                                            </div>
                                        </div>
                                        <div style="margin: auto; width: max-content;">
                                            <button type="submit" class="btn btn-info">Submit</button>
                                        </div>

                              
                                </div>
                            </div>
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

    <script src="/cdn/Alertify/alertify.min.js"></script>

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                alertify.set('notifier', 'position', 'top-right');
                alertify.warning('{{ $error }}');
            </script>
        @endforeach
    @endif

    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                "searching": false, // Disable searching
                "paging": false, // Disable pagination
                "info": false
            });

            $('#example2').DataTable({
                "searching": false, // Disable searching
                "paging": true, // Enable pagination
                "lengthMenu": [5, 10, 15, 100], // Set the length menu
                "pageLength": 5, // Set the default page length
                "info": false // Disable table information
            });
        });

        function calculateNetAmount() {
            // Get the values
            var onAccountReceived = parseFloat(document.getElementById('on_account_received').value);
            var cgst = parseFloat(document.getElementById('cgst').value);
            var sgst = parseFloat(document.getElementById('sgst').value);
            var igst = parseFloat(document.getElementById('igst').value);

            // Calculate net amount
            var netAmount = onAccountReceived +cgst + sgst + igst;

            let balance = document.getElementsByClassName('balance')[0].innerText;
            console.log(balance);
            console.log(netAmount.toFixed(2));

            if (Number(balance) < Number(netAmount.toFixed(2))) {
                console.log("Condition met: net amount is greater than balance");
                alertify.set('notifier', 'position', 'top-center');
                alertify.error('Net amount should not be greater than balance');
                $('#on_account_received').val(0);
                netAmount = 0;
            } else {
                console.log("Condition not met: net amount is not greater than balance");
            }
            


            document.getElementById('net_amount').value = netAmount.toFixed(2);
        }

        // Event listeners for input fields
        document.getElementById('on_account_received').addEventListener('input', calculateNetAmount);
        document.getElementById('cgst').addEventListener('input', calculateNetAmount);
        document.getElementById('sgst').addEventListener('input', calculateNetAmount);
        document.getElementById('igst').addEventListener('input', calculateNetAmount);
        calculateNetAmount();

        function confirmDelete(invoiceId) {

            alertify.confirm("Confirm Deletion", "Are you sure you want to delete this creditnote? ",
                function () { // If user confirms
                    var deleteUrl = '/creditnote/delete/' + invoiceId;
                    
                    $.ajax({
                        url: deleteUrl,
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                        },
                        success: function(response) {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.success(response.message);

                            setTimeout(() => {
                                window.location.href=window.location.href;
                            }, 2000);
                        },
                        error: function(xhr, status, error) {
                            alertify.set('notifier', 'position', 'top-right');
                            alertify.error('Error occurred while deleting creditnote: ' + xhr.responseText);
                        }
                    });
                    
                },
                function () { // If user cancels
                    alertify.set('notifier', 'position', 'top-right');
                    alertify.error('Deletion canceled');
                });
        }

    </script>
@endsection
