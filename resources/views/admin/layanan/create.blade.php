@extends('layouts.dashboard')
@section('antena')
<h1>layanan</h1>
<nav>
  
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/jns"> layanan</a></li>
    <li class="breadcrumb-item active">Create</li>
  </ol>
@endsection
@section('isi')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Form tambah paket</h5>      
      <form action="{{ route('layanan.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="inputNanme4">
        </div>    
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Jenis</label>
              <select class="form-select" name="jnsid" aria-label="Default select example">
                @foreach ($datas as $key )
                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                     @endforeach
              </select>
            
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Status</label>
              <select class="form-select" name="status" aria-label="Default select example">
               
                        <option value="1">Tersedia</option>
                     
              </select>
            
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Harga</label>
          <input type="number" name="harga" class="form-control" id="inputNanme4">
        </div>     
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Bahasa</label>
          <input type="text" name="bahasa" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Fitur</label>
          <input type="text" name="fitur" class="form-control" id="inputNanme4">
        </div>  
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Lokasi</label>
          <input type="text" name="lokasi" class="form-control" id="inputNanme4">
        </div> 
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Deskripsi</label>
          <textarea class="form-control" placeholder="Deskripsi" name="deskripsi" id="floatingTextarea" style="height: 100px;"></textarea>
        </div>           
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Image</label>
          <input class="form-control" type="file" id="image" name="image" value="{{ old('image') }}" />
                <img id="preview-image-before-upload" src="" alt="" style="width: 250px" class="mt-3" />
          
        </div>  
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>

    </div>
  </div>
@endsection