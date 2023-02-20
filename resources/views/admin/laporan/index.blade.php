@extends('layouts.dashboard')
@section('button')
<a href="/laporanexcel" class="btn btn-success">Download Excel</a>
<a href="/laporanpdf" class="btn btn-danger">Download Pdf</a>
@endsection
@section('isi')
<div class="card text-center">
    <div class="card-body">
      <h5 class="card-title">Laporan transaksi</h5>

      <!-- Table with hoverable rows -->
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col">Nama pembeli</th>
            <th scope="col">Nama layanan</th>
            <th scope="col">Metode pembayaran</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total bayar</th>
            
       
          </tr>
        </thead>
        @foreach ($datas as $key)
          
        
        <tbody>
          <tr>
            
            <th scope="row">{{ $key->transaksiuser->name }}</th>
           
              
            
            <td>
              @foreach ($data as $i )
               @if ($key->transaksi->layananid === $i->id)
               {{ $i->name }}
              @endif
              @endforeach
  
             
            </td>
            
            <td>{{ $key->metode_pembayaran }}</td>
            <td>{{ $key->jumlah }}</td>
            <td>Rp. {{number_format($key->bayar, 0, '', '.') }}</td>
            
          </tr>
         
        </tbody>
        @endforeach
      </table>
      

    </div>
  </div>
@endsection