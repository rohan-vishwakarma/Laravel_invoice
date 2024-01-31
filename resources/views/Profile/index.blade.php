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



<div class="container-fluid" style="margin-top: 5%">
    <h3 style="text-align: center">USER PROFILE</h3>

    @if ($errors->any())
    <div class="alert alert-danger m-auto w-50">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>   
    @endif


   
    
      <div class="my-3 p-3 bg-body rounded shadow-sm m-auto w-50">
        <h6 class="border-bottom pb-2 mb-0">Recent updates</h6>

        @foreach ($users as $user)
  
        <div class="d-flex text-body-secondary pt-3">
          <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"/><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>
          <p class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark">Username : <input type="text" value="{{ $user->username }}" name="username" class="form-control form-control-sm" > </strong>
          </p>
        </div>
        <div class="d-flex text-body-secondary pt-3">
          <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"/><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>
          <p class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark">Email <input type="text" value=" {{ $user->email }}" name="email" class="form-control form-control-sm" ></strong>
          </p>
        </div>
        <div class="d-flex text-body-secondary pt-3">
          <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#6f42c1"/><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text></svg>
          <p class="pb-3 mb-0 small lh-sm border-bottom">
            <strong class="d-block text-gray-dark">Type <input type="text" value=" {{ $user->type }}" name="type" class="form-control form-control-sm" ></strong>
          </p>
        </div>
        <small class="d-block text-end mt-3">
          <a href="#">All updates</a>
        </small>

        @endforeach
      </div>

   
</div>
    
@endsection