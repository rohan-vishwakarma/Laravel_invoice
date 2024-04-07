@extends('Layouts.master')
@section('title')
    INTERNAL SERVER ERROR
@endsection

@section('content')


<main class="container-fluid" >
    <div class="row p-4 p-md-5 mb-4 rounded text-body-emphasis " style="margin-top:2%;">
      
        <div class="col-sm-4">

        </div>
        <div class="col-sm-4">
            <h4 style="text-align: center">Internal Server Error!</h4>
            <h4 style="text-align: center"> Please Try Again after sometimes</h4>
            <div style="    margin: auto;
            width: max-content;">
                <img src="/images/internalservererror.gif" alt="internalservererror">
            </div>
        </div>
        <div class="col-sm-4">
            
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

footer {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   text-align: center;
}

  </style>

  <footer>
    <small>
      Copyright © 2023 JD SOFTECH. All Rights Reserved.
    </small>
  </footer>
    
@endsection