@extends('_layouts.base')

@section('title', "Login")
@section('content')
  <div style="margin-top: 200px;">
    <div class="container">
      @if(session('success'))
      <p class="alert alert-success">{{ session('success') }}</p>
    @endif
    @if($errors->any())
      @foreach($errors->all() as $err)
        <p class="alert alert-danger">{{ $err }}</p>
      @endforeach
    @endif
      <div class="m-auto my-5" style="max-width: 500px; background-color: #6AA062;">
       
        <form  method="POST" action="{{ url("/login") }}" class="p-5 text-white">
          @csrf
          <h3 class="text-center fw-bold mb-5"> Login User </h3>
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary rounded" style="background-color: #FEA24D; border-color: #FEA24D;">Login</button>
          </div>
          <div class="mt-4 text-center">
            <img class="img-fluid w-50" src="./assets/images/Innovillage-2022-Logo.png" alt="">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection