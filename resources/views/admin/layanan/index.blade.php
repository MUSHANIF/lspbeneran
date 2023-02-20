@extends('layouts.dashboard')
@section('antena')
<h1>layanan</h1>
<nav>
  
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/layanan">layanan</a></li>
    <li class="breadcrumb-item active">Home</li>
  </ol>
@endsection
@section('search')
<form action="{{ url('layanan') }}" method="GET" class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
  <div class="input-group">
    <input type="text" name="cari" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
    <div class="input-group-append">
      <button type="submit" class="btn" style="background-color: #1840a9; color: white" type="button">
        <i class="fa fa-sign-out-alt size-icon-1"></i>
        Cari
      </button>
    </div>
  </div>
</form>
@endsection
@section('button')
<a href="{{ route('layanan.create') }}" class="btn btn-primary">Tambah</a>
@endsection
@section('isi')
<div class="card text-center">
    <div class="card-body">
      <h5 class="card-title">Paket</h5>

      
      <table class="table table-hover">
        <thead>
          <tr>
            
            <th scope="col">image</th>
            <th scope="col">Jenis</th>
            <th scope="col">Name</th>
            <th scope="col">Harga</th>
            
            <th scope="col">Status</th>
            <th scope="col">Deskripsi</th>
            <th scope="col">Action</th>
       
          </tr>
        </thead>
      
          
        
        <tbody>
          @if ($datas->count())                  
          @foreach ($datas as $key)
          <tr>
            <td id="td"><img src="/assets/images/layanan/{{ $key->image }}" style="height: 100px; width: 150px" /></td>
            <td scope="row">{{ $key->layanan->name }}</td>
            <td scope="row">{{ $key->name }}</td>
            <td scope="row">Rp. {{number_format($key->harga, 0, '', '.') }}</td>
            
            
            @if ($key->status == 1)
            <td scope="row">Tersedia</td>
            @else
            <td scope="row">Tidak Tersedia</td>
            @endif
            <td scope="row">{{ $key->deskripsi }}</td>
            <td> 
              <a href="{{ route('layanan.edit',$key->id) }}" class="btn btn-success"><i class="bi bi-pencil-fill"></i></a>
            
              <form action="{{ url('layanan/'.$key->id) }}" method="POST" >
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                
            </form>
          </td>
          </tr>
          @endforeach
          @else
            <td colspan="8">No products found</td>
          @endif
        </tbody>
       
      </table>
      

    </div>
  </div>
@endsection