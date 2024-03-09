@extends('Layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')

<style>
    input {
        font-weight: 500 !important;
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="//code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.js"></script>
<link href="//rawgithub.com/indrimuska/jquery-editable-select/master/dist/jquery-editable-select.min.css" rel="stylesheet">

<main style="margin-top: 4%; max-height: none">

    @include('Layouts.sidebar')


    <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">

        <h2 class="text-center" style="    color: orange;font-family: fantasy;">
            <i class="fas fa-file-invoice" style="color: sandybrown;margin-right: 23px;"></i>
            INVOICE GENERATION
        </h2>

        @if (session('success'))
        <div class="alert alert-success " style="margin: auto; text-align: center">
            {{ session('success') }}
        </div>
    @endif
        <form action="/createinvoice" method="post">
            @csrf
            <div class="container mt-1 " style="    border: 1px solid #d2c0c3;margin: auto;width: 90%;     border-radius: 7px;">
                <table>
                    <thead>        
                    </thead>
                    <tbody>
                        <tr style="border-bottom: 1px solid;">
                            <td>INV NO:<input type="text" value="{{ $invoiceno}}" name="invoiceno" id="invoiceno" class="form-control form-control-sm"></td>
                        </tr>
                        <tr>
                            <td>.</td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <span>To :</span>
                                <select type="text" name="customername" placeholder="customer name" id="customername" class="form-control form-control-sm">
                                    @foreach ($customers as $cust)
                                        <option value="{{$cust}}">{{$cust}}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td colspan="1" ></td>
                            <td colspan="3"><input type="text" name="companyname" placeholder="company name" id="invoiceno" value="{{$company->companyname}}" class="form-control form-control-sm"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="text" name="custadd" placeholder="customer address " id="custadd" class="form-control form-control-sm" readonly></td>
                            <td colspan="2"></td>
                            <td colspan="3"><input type="text" name="address"  value="{{$company->address}}" placeholder="address " id="address" class="form-control form-control-sm"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="email" name="custemail" placeholder="custemail" id="custemail"  class="form-control form-control-sm" readonly></td>
                            <td colspan="2"></td>
                            <td colspan="3"><input type="text" name="email" placeholder="email" id="email" value="{{$company->email}}"  class="form-control form-control-sm"></td>
                        </tr>
                        <tr>
                            <td colspan="3"><input type="text" name="custgstin" placeholder="custgst in " id="custgstin" class="form-control form-control-sm" readonly></td>
                            <td colspan="2"></td>
                            <td colspan="3"><input type="text" name="gstin" placeholder="gst in " id="gstin" value="{{$company->gstin}}"  class="form-control form-control-sm"></td>
                        </tr>
                        <tr>
                            <td colspan="8" style="visibility: hidden;">pp</td>
                        </tr>
                        <tr>
                            <td colspan="4">Description</td>
                            <td>Note</td>
                            <td>Quantity</td>
                            <td>Rate</td>
                            <td>Amount</td>
                        </tr>
                        <tr class="rowforcal">
                            <td style="width: 40%;" colspan="4">
                                <textarea style="width: 100%" placeholder="Item name & Description" type="text"  name="description[]" id="description" required></textarea>
                            </td>
                            <td><input type="text" name="note" id="note"></td>
                            <td><input type="number" style="width: 100%;" name="quantity[]" id="quantity" required></td>
                            <td><input type="number" style="width: 100%;" name="rate[]" id="rate" required></td>
                            <td><input type="number" name="amount[]" style="width: 100%;" id="amount" required></td>
                            <td><button type="button" id="add" class="btn btn-info">+</button></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td></td>
                            <td>TOTAL: </td>
                            <td><input type="text" class="form-control form-control-sm" name="total" id="total" readonly></td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td></td>
                            <td>TAX: </td>
                            <td>
                                <select type="text" class="form-control form-control-sm" name="tax" id="tax">
                                    <option value="NOGST" selected>NOGST</option>
                                    <option value="CGST-SGST">CGST-SGST</option>
                                    <option value="IGST">IGST</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td></td>
                            <td>TOTAL TAX: </td>
                            <td>
                                <input type="text" class="form-control form-control-sm" name="totaltax" id="totaltax" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="5"></td>
                            <td></td>
                            <td>GRAND TOTAL: </td>
                            <td><input type="text" class="form-control form-control-sm" name="grandtotal" id="grandtotal" readonly></td>
                        </tr>
                    </tbody>
                </table>

                <div style="margin: auto; width: 50%">
                    <button type="submit" class="btn btn-info">Generate</button>
                </div>
            
            </div>
        </form>

    </div>
  
  </main>
  <script>
$(document).ready(function() {
    // Function to calculate amount
    function calculateAmount(row) {
        var quantity = parseFloat(row.find('#quantity').val());
        var rate = parseFloat(row.find('#rate').val());
        var amount = quantity * rate;
        row.find('#amount').val(amount.toFixed(2)); // Set the calculated amount with 2 decimal places
    }

    // Function to calculate total amount, total tax, and grand total
    function calculateTotals() {
        var totalAmount = 0;
        $('.rowforcal').each(function() {
            var amount = parseFloat($(this).find('#amount').val());
            if (!isNaN(amount)) {
                totalAmount += amount;
            }
        });
        $('#total').val(totalAmount.toFixed(2)); // Set total amount

        var taxRate = 0;
        var totalTaxType = $('#tax').val();
        if (totalTaxType === 'CGST-SGST') {
            taxRate = 0.18; // Assuming 18% CGST-SGST
        } else if (totalTaxType === 'IGST') {
            taxRate = 0.18; // Assuming 18% IGST
        }

        var totalTax = totalAmount * taxRate;
        $('#totaltax').val(totalTax.toFixed(2)); // Set total tax

        var grandTotal = totalAmount + totalTax;
        $('#grandtotal').val(grandTotal.toFixed(2)); // Set grand total
    }

    // Add row
    $('#add').click(function() {
        var newRow = $('.rowforcal').first().clone(); // Clone the first row
        newRow.find('input').val(''); // Clear input values
        newRow.find('textarea').val(''); // Clear textarea values
        newRow.find('button').text('-').attr('id', 'remove').removeClass('btn-info').addClass('btn-danger'); // Change button to remove
        $('.rowforcal:last').after(newRow); // Append the new row after the last row
    });

    // Remove row
    $(document).on('click', '#remove', function() {
        $(this).closest('tr').remove(); // Remove the closest parent row
        calculateTotals(); // Recalculate totals after removing a row
    });

    // Calculate amount when quantity or rate changes
    $(document).on('input', '#quantity, #rate', function() {
        var row = $(this).closest('tr');
        calculateAmount(row);
        calculateTotals(); // Recalculate totals after changing quantity or rate
    });

    // Recalculate totals when total tax type changes
    $('#tax').change(function() {
        calculateTotals();
    });
});

$('#customername').editableSelect()
    .on('select.editable-select', function (e, li) {
        $.ajax({
            url: '/api/customers',
            type: 'GET',
            dataType: 'json',
            success: function(data){
                const customer = data.find((item) => item.name == li.text());
                if (customer) {
                    $('#custadd').val(customer.address);
                    $('#custemail').val(customer.email);
                    $('#custgstin').val(customer.gstin);
                } else {
                    $('#custadd').val('');
                    $('#custemail').val('');
                    $('#custgstin').val('');
                    alert("Customer not found!");
                }
            },
            error: function(xhr, status, error) {
                alert("An error occurred while fetching customer data: " + error);
            }
        });
    });


    

</script>


  <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<!-- Bootstrap Bundle (includes Popper) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
<!-- Bootstrap CSS -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"> -->



<!-- DataTables Bootstrap 5 CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">

<script>
    	
      new DataTable('#example');
 </script>
      
@endsection