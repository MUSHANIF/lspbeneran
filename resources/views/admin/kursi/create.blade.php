@extends('layouts.dashboard')
@section('antena')
<h1>Jenis kursi</h1>
<nav>
  
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/kursi">Jenis kursi</a></li>
    <li class="breadcrumb-item active">Create</li>
  </ol>
@endsection
@section('isi')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Form tambah Stok kursi</h5>      
      <form action="{{ route('kursi.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Nama layanan</label>
          <select class="form-select" name="layananid" aria-label="Default select example">
            @foreach ($datas as $key )
                    <option value="{{ $key->id }}">{{ $key->name }}</option>
                 @endforeach
          </select>
        
    
        </div>          
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Stok kursi</label>
          <input type="text" name="stok" class="form-control" id="inputNanme4">
        </div> 
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Status</label>
              <select class="form-select" name="status" aria-label="Default select example">
               
                        <option value="1">Tersedia</option>
                     
              </select>
            
        </div>  
        
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>

    </div>
  </div>
@endsection