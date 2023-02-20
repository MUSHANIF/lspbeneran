@extends('layouts.dashboard')
@section('antena')
<h1>layanan</h1>
<nav>
  
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/layanan">layanan</a></li>
    <li class="breadcrumb-item active">Change</li>
  </ol>
@endsection
@section('isi')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">Form tambah layanan</h5>      
      <form action="{{ route('layanan.update', $datas->id) }}" method="POST" class="row g-3" enctype="multipart/form-data" >
        @csrf
        <input type="hidden" name="_method" value="PATCH">
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Name</label>
          <input type="text" name="name" value="{{ $datas->name }}" class="form-control" id="inputNanme4">
        </div>    
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Jenis</label>
              <select class="form-select" name="jnsid" aria-label="Default select example">
                @foreach ($data as $key )
                        <option value="{{ $key->id }}" @selected($datas->jnsid == $key->id)>{{ $key->name }}</option>
                     @endforeach
              </select>
            
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Harga</label>
          <input type="number" name="harga" value="{{ $datas->harga }}" class="form-control" id="inputNanme4">
        </div>     
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Bahasa</label>
          <input type="text" name="bahasa" value="{{ $datas->bahasa }}" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Fitur</label>
          <input type="text" name="fitur" value="{{ $datas->fitur }}" class="form-control" id="inputNanme4">
        </div>  
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Lokasi</label>
          <input type="text" name="lokasi" value="{{ $datas->lokasi }}" class="form-control" id="inputNanme4">
        </div> 
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Deskripsi</label>
          <textarea class="form-control" placeholder="Deskripsi" value="" name="deskripsi" id="floatingTextarea" style="height: 100px;">{{ $datas->deskripsi }}</textarea>
        </div>           
        <div class="col-12">
          <label for="inputNanme4" class="form-label">Image</label>
          <input class="form-control" type="file" id="image" name="image" value="{{ URL::asset('/assets/images/layanan/'.$datas->image) }}" />
                <img id="preview-image-before-upload" src="/assets/images/layanan/{{ $datas->image }}" alt="" style="width: 250px" class="mt-3" />
          
        </div>  
        <div class="text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>

    </div>
  </div>
@endsection