@extends('layouts.dashboard')
{{-- @section('button')
<a href="{{ route('layanan.create') }}" class="btn btn-primary">Bayar semua</a>
@endsection --}}
@section('isi')

@if (!empty($cek))
  

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Tiket yang sudah anda pesan anda</h5>
     
      <!-- Active Table -->
      <table class="table table-borderless">
        <thead class="text-center">
          <tr>
            <th scope="col">Jenis layanan</th>
            <th scope="col">Nama layanan</th>            
            <th scope="col">Waktu</th>
            <th scope="col">jumlah</th>
            <th scope="col">Status</th>
            <th scope="col">Lihat bukti </th>
            
          </tr>
        </thead>
        <tbody>
          @foreach ($cart as $key )
            
          
          <tr>
            
            <td>{{ $key->jns->name }}</td>
            <td>{{ $key->cart->name }}</td>
            <td>{{ $key->waktu }}</td>
            <td>{{ $key->jumlah }}</td>
            <td>
              @if ( $key->status == 0 )
                Belum di bayar
              @else
              <span class="card text-bg-success p-1 text-white text-center">Sudah di bayar</span>
              @endif
            </td>
            <td>
              <form action="{{ route('bukti',Auth::user()->id) }}" class="text-center">
                <input type="hidden" value="{{ $key->id }}" name="bukti">
                <button class="btn btn-danger text-center">Lihat</button>
              </form>
              
            </td>
          </tr>
          @endforeach
        
        </tbody>
      </table>
      <!-- End Tables without borders -->
      
      
    </div>
  </div>
  @else
    <span class="text-center">Anda belum memesan tiket</span>
    
  @endif

@endsection
{{-- @section('berita')
<div class="col-lg-4">

        

    <div class="card">
            

        <div class="card-body pb-0">
          <h5 class="card-title">News &amp; Updates <span>| Today</span></h5>
    
          <div class="news">
            <div class="post-item clearfix">
              <img src="{{ asset('assets/img/news-1.jpg') }}" alt="">
              <h4><a href="#">Nihil blanditiis at in nihil autem</a></h4>
              <p>Sit recusandae non aspernatur laboriosam. Quia enim eligendi sed ut harum...</p>
            </div>
    
            <div class="post-item clearfix">
              <img src="{{ asset("assets/img/news-2.jpg") }}" alt="">
              <h4><a href="#">Quidem autem et impedit</a></h4>
              <p>Illo nemo neque maiores vitae officiis cum eum turos elan dries werona nande...</p>
            </div>
    
            
    
       
    
          </div><!-- End sidebar recent posts-->
    
        </div>
      </div><!-- End News & Updates -->

  

   

  </div>
 <!-- News & Updates Traffic -->
 
@endsection --}}