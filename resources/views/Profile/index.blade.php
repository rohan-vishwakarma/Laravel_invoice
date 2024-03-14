@extends('Layouts.master')
@section('title')
    USER PROFILE
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
          USER PROFILE
      </h2>
        <div class="row">

          <form>
            <div class="form-group col-sm-3">
              <label for="exampleInputEmail1">Username</label>
              <input type="text" class="form-control" id="exampleInputEmail1" value="{{$users->username}}" placeholder="username" readonly>
            </div>

            <div class="form-group col-sm-3">
              <label for="exampleInputPassword1">Email</label>
              <input type="email" class="form-control" id="email" value="{{$users->email}}"  placeholder="Email" readonly>
            </div>
            <div class="form-check">
            </div>
            {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}
          </form>
           
          </div>
        </div>
    </div>
  
  </main>



    
@endsection