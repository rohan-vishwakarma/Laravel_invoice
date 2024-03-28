@extends('Layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')


<main class="container" style="margin-top: 5%">

  
</main>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<main >

    @include('Layouts.sidebar')
    <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">
      <div class="container">

        <h2 class="text-center mt-2" style="color: orange;font-family: fantasy;">
          <i class="fas fa-credit-card" style="color: #646968;margin-right: 23px;"></i>
          DASHBOARD
      </h2>
        <div class="row mt-5">
            
            <div class="col-sm-3">
              <div class="card">
                <div class="">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td colspan="2" style="    background: #caeae8;">
                          <i class="fa fa-file-invoice" style="color: salmon;font-size: 41px; " aria-hidden="true"></i>
                          <h5>Invoice Overview</h5>
                        </td>
                      </tr>
                      <tr>
                       
                        <td>Total no Invoices:</td>
                        <td>{{$invoiceCount}}</td>
                      </tr>
                      <tr>
                       
                        <td>Overall amount:</td>
                        <td>{{$totaloverallamount}}</td>
                      </tr>
                      <tr>
                        <td>Total Invoice (Today):</td>
                        <td>{{$TodayinvoiceCount}}</td>
                      </tr>
                      <tr>
                        <td>Total Invoice Amount (Today):</td>
                        <td>{{$TotalInvoiceAmtOfToday}}</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="/invoices" class="btn btn-primary">View</a>
                  
                </div>
              </div>
            </div>

            <div class="col-sm-3">
              <div class="card">
                <div class="">
                  <table class="table">
                    <tbody>
                      <tr>
                        <td colspan="2" style="    background: #caeae8;">
                          <i class="fa fa-file-invoice" style="color: salmon;font-size: 41px; " aria-hidden="true"></i>
                          <h5>Credit Overview</h5>
                        </td>
                      </tr>
                      <tr>
                       
                        <td>Total CR Note:</td>
                        <td>{{$totalCreditnote}}</td>
                      </tr>
                      <tr>
                       
                        <td>Overall amount:</td>
                        <td>{{$totalcreditamount}}</td>
                      </tr>
                      <tr>
                        <td>Total Credit (Today):</td>
                        <td>{{$TodayinvoiceCount}}</td>
                      </tr>
                      <tr>
                        <td>Total Credit Amount :</td>
                        <td>{{$todaycreditamount}}</td>
                      </tr>
                    </tbody>
                  </table>
                  <a href="/invoices" class="btn btn-primary">View</a>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  
  </main>



    
@endsection