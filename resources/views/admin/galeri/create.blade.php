@extends('layouts.dashboard')
@section('antena')
<h1>Jenis layanan</h1>
<nav>
  
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/jns">Jenis layanan</a></li>
    <li class="breadcrumb-item active">Create</li>
  </ol>
@endsection
@section('isi')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Form tambah Foto</h5>      
      <form action="{{ route('detailgambar.store') }}" method="POST" class="row g-3" enctype="multipart/form-data">
        @csrf
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Jenis</label>
              <select class="form-select" name="layananid" aria-label="Default select example">
                @foreach ($datas as $key )
                        <option value="{{ $key->id }}">{{ $key->name }}</option>
                     @endforeach
              </select>
            
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Image</label>
          <input class="form-control" type="file" id="image" name="image" value="{{ old('image') }}" required/>
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