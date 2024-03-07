@section('title')
    LOGIN
@endsection
@extends('Layouts.master')

@section('content')

<style>
    input {
        border: 1px solid black;
    }
</style>



<div class="container" style="margin-top: 5%">
    <h3 style="text-align: center">Otp Verification</h3>

    @if ($errors->any())
    <div class="alert alert-danger m-auto w-50">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
    <form method="POST" class="mt-1" style="margin: auto; width: 50%;border: 1px solid black;padding: 13px;border-radius: 8px;">
      @csrf 
      <div class="form-group row">
        <label for="staticEmail" class="col-sm-2 col-form-label" style="color: black">Username</label>
        <div class="col-sm-10">
          <input type="text" name="username" value="{{ old('username') }}" class="form-control form-control-sm" id="staticEmail" >
        </div>
      </div>

      <div class="form-group row mt-4">
            <label for="staticEmail" class="col-sm-2 col-form-label" style="color: black">Email</label>
            <div class="col-sm-10">
              <input type="text" name="email" value="{{ old('email') }}" class="form-control form-control-sm" id="staticEmail" >
            </div>
          </div>

        <div class="form-group row mt-4">
          <label for="inputPassword" class="col-sm-2 col-form-label" style="color: black">OTP</label>
          <div class="col-sm-10">
            <input type="text" name="otp"  class="form-control form-control-sm" value="{{ old('otp') }}" id="inputPassword" >
          </div>
        </div>


          <div class="form-group row mt-4">
            <label class="col-sm-2 col-form-label" style="color: black; "></label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">SUBMIT</button>
            </div>
          </div>


      </form>
</div>
    
@endsection