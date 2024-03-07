@extends('Layouts.master')
@section('title')
    Dashboard
@endsection

@section('content')


<main class="container" style="margin-top: 5%">

  
</main>



  

<main style="">

    @include('Layouts.sidebar')



    <div class="d-flex flex-column align-items-stretch flex-shrink-0 " style="width: 80%;">
     
    
      <div class="container">
        <div class="row">
            
            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">{{$customerCount }}  Customers</h5>
                  <p class="card-text"></p>
                  <a href="/customers" class="btn btn-primary">View</a>
                </div>
              </div>
            </div>

            <div class="col-sm-4">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Invoices</h5>
                  <p class="card-text"></p>
                  <a href="#" class="btn btn-primary">View</a>
                </div>
              </div>
            </div>
          </div>
        </div>
          

    </div>
  
  </main>



    
@endsection