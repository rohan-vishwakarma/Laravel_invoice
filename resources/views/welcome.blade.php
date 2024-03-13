@extends('Layouts.master')
@section('title')
    PARSHWANT ELECTRONICS
@endsection

@section('content')


<main class="container-fluid" >
    <div class="row p-4 p-md-5 mb-4 rounded text-body-emphasis " style="margin-top:2%;">
      <div class="col-lg-6 col-sm-6 px-0">
        <img src="/images/erp.jpg" style=" border-radius: 2%;    margin: auto;width: -webkit-fill-available;" alt="erp">
      </div>
      <div class="col-sm-6 col-lg-6">

          <div class="mt-4">
            <p style="font-size: 30px; font-weight: 500; font-family: monospace;">Your Business. Your Clients.
              </p>
              <p style="font-size: 25px; font-weight: 500; font-family: monospace;">
                One Free, Powerful Invoicing Platform.
              </p>
          </div>

      </div>

    </div>

    <div class="container mb-4">
      <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col-sm-4">
          <div class="card">
            <div class="image-container">
              <img src="/images/bill.gif"  class="card-img-top" alt="...">

            </div>
            <div class="card-body">
              <h5 class="card-title">Billing /Invoicing Customisation</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <div class="image-container">
              <img src="/images/creditnote.gif" class="card-img-top" alt="...">
            </div>
            <div class="card-body">
              <h5 class="card-title">Credit Note Payment</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
            </div>
          </div>
        </div>
        
      </div>
    </div>
</main>

  <style>
   footer {
    text-align: center;
    padding: 5px;
    background-color: #afdddd;
    color: #000;
    font-weight: 600;
}
/* CSS */
.image-container {
    width: -webkit-fill-available; /* Adjust as needed */
    height: 200px; /* Adjust as needed */
    overflow: hidden; /* This ensures that images don't overflow the container */
}

.image-container img {
    width: 100%;
    height: 100%;
    object-fit: fill; /* This property ensures the image fills the container without distortion */
}

  </style>

  <footer>
    <small>
      Copyright © 2023 JD SOFTECH. All Rights Reserved.
    </small>
  </footer>
    
@endsection