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
    <br>

    @if ($errors->any())
    <div class="alert alert-danger m-auto w-50">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
      <div class="col-sm-8">

      </div>
      <div class="col-sm-4">
        <h3 style="text-align: center">LOGIN TO YOUR ACCOUNT</h3>

        <form method="POST" class="mt-1" style="border: 1px solid black;padding: 13px;border-radius: 8px;">
          @csrf  
          <div class="form-group row">
                <label for="staticEmail" class="col-sm-2 col-form-label" style="color: black">Email</label>
                <div class="col-sm-10">
                  <input type="text" name="email" value="{{old('email')}}" class="form-control form-control-sm" id="staticEmail" >
                </div>
              </div>
            <div class="form-group row mt-4">
              <label for="inputPassword" class="col-sm-2 col-form-label" style="color: black">Password</label>
              <div class="col-sm-10">
                <input type="password" name="password"  class="form-control form-control-sm" id="inputPassword" >
              </div>
            </div>
    
    
              <div class="form-group row mt-4">
                <label class="col-sm-2 col-form-label" style="color: black; "></label>
                <div class="col-sm-10">
                  <button type="submit" class="btn btn-info">LOGIN</button>
                </div>
              </div>
    
    
        </form>

      </div>
    </div>
   
 
</div>
    
@endsection