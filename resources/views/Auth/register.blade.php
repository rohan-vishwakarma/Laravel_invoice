@section('title')
    SIGNIN
@endsection
@extends('Layouts.master')

@section('content')

<style>
    input {
        border: 1px solid black;
    }
</style>

<style>
    .err {
        margin: auto;
    width: max-content;
    color: crimson;
    }
</style>

<div class="container" style="margin-top: 5%">
    <h3 style="text-align: center">REGISTER YOURSELF</h3>

    <ul class="err">
    @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
    </ul>
   
    <form method="POST" class="mt-1" style="margin: auto; width: 50%;border: 1px solid black;padding: 13px;border-radius: 8px;">
        @csrf
        <div class="form-group row">
            <label for="staticEmail" class="col-sm-2 col-form-label" style="color: black">Username</label>
            <div class="col-sm-10">
              <input type="text" name="username" value="{{old('username')}}" class="form-control form-control-sm" id="staticEmail" >
            </div>
          </div>
        <div class="form-group row mt-4">
          <label for="staticEmail" class="col-sm-2 col-form-label" style="color: black">Email</label>
          <div class="col-sm-10">
            <input type="text" name="email" value="{{old('email')}}" class="form-control form-control-sm" id="staticEmail" >
          </div>
        </div>

        
        

        <div class="form-group row mt-4">
          <label for="inputPassword" class="col-sm-2 col-form-label" style="color: black">Password</label>
          <div class="col-sm-10">
            <input type="password" name="password" value="{{old('password')}}" class="form-control form-control-sm" id="inputPassword" >
          </div>
        </div>

        <div class="form-group row mt-4">
            <label for="inputPassword" class="col-sm-2 col-form-label" style="color: black">C. Password</label>
            <div class="col-sm-10">
              <input type="password" name="password_confirmation" class="form-control form-control-sm " id="inputPassword" >
            </div>
          </div>

          <div class="form-group row mt-4">
            <label class="col-sm-2 col-form-label" style="color: black; "></label>
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">REGISTER</button> or <a href="/login">Click here to login</a>
            </div>
          </div>


      </form>
</div>
    
@endsection