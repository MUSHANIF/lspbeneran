@extends('layouts.dashboard')
@section('antena')
<h1>Admin</h1>
<nav>
  
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/jns">Admin</a></li>
    <li class="breadcrumb-item active">Ubah</li>
  </ol>
@endsection
@section('isi')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Ubah Admin</h5>

      <!-- Vertical Form -->
      <form action="{{ route('dataadmin.update',$datas->id) }}" method="POST" class="row g-3" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <input type="hidden" value="2" name="level">
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Name</label>
          <input type="text" name="name" value="{{ $datas->name }}" class="form-control" id="inputNanme4">
        </div>    
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Email</label>
          <input type="email" name="email" value="{{ $datas->email }}" class="form-control" id="inputNanme4">
        </div>   
        
       
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form><!-- Vertical Form -->

    </div>
  </div>
@endsection