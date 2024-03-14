@extends('Layouts.master')
@section('title')
    SMART INVOICE
@endsection

@section('content')


<main class="container-fluid" >
    <div class="row p-4 p-md-5 mb-4 rounded text-body-emphasis " style="margin-top:2%;    background-color: steelblue;">
      <div class="col-lg-6 col-sm-6 px-0">
        <img src="/images/erp.jpg" style=" border-radius: 2%;    margin: auto;width: -webkit-fill-available;" alt="erp">
      </div>
      <div class="col-sm-6 col-lg-6">

          <div class="mt-4">
            <p style="font-size: 30px; font-weight: 500; font-family: monospace; color: white">Smart Invoicing.
              </p>
              <p style="font-size: 25px; font-weight: 500; font-family: monospace;  color: white">
                Empower your business with streamlined invoicing - where efficiency meets excellence.
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
              <p class="card-text">
                Tailoring billing and invoice templates to reflect your brand's identity is paramount for leaving a lasting impression on clients.
                 Customization allows you to infuse your company's logo, color scheme, and typography into every invoice, reinforcing brand recognition with each transaction. Beyond aesthetics,
                 personalized invoices can also include relevant contact information, payment terms, and itemized details specific to your business, enhancing clarity and professionalism.
                </p>
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
              <p class="card-text">
                A credit note, also known as a credit memo or credit memorandum, is a financial document issued by a seller to a buyer
                 to acknowledge a reduction in the amount owed by the buyer to the seller. It serves as a form of acknowledgment for goods returned or services not rendered,
                 or for any other reason necessitating a refund or adjustment to an invoice previously issued.</p>
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