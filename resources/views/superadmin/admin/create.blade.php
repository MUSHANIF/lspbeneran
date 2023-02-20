@extends('layouts.dashboard')
@section('antena')
<h1>Admin</h1>
<nav>
  
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/dataadmin">admin</a></li>
    <li class="breadcrumb-item active">Create</li>
  </ol>
@endsection
@section('isi')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Form tambah jenis layanan</h5>      
      <form action="{{ route('dataadmin.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="2" name="level">
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="inputNanme4">
        </div>    
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="inputNanme4">
        </div>   
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Password</label>
          <input type="password" name="password" class="form-control" id="inputNanme4">
        </div>             
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>

    </div>
  </div>
@endsection