@extends('layouts.dashboard')
@section('isi')

    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
        <h5 class="mb-0">List pembayaran</h5>
        
      </div>
      <div class="card-body" style="color: black;">
       
            
     
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Paket: </label>
            
            <div class="col-sm-10 mt-2">
            @foreach ($layanan as $m )
            {{ $m->cart->name }} 
             @endforeach
         </div>
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Jumlah Paket dan tiket yang di pesan: </label>
            
            <div class="col-sm-10 mt-3">
              {{ $jmlh }} untuk {{ $orang }} Orang
        </div>
        <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Total harga: </label>
            
            <div class="col-sm-10 mt-2">
                
             Rp. {{number_format($total, 0, '', '.') }}
        </div>
        <form action="{{ route('bayar',Auth::id()) }}" method="POST"  enctype="multipart/form-data" >
            @csrf
        
           @foreach ($layanan2 as $m )
               
           <input type="hidden" name="userid" value="{{ $m->userid }}">
           <input type="hidden"  name="cartid" value="{{ $m->id }}"/>
           <input type="hidden"  name="jumlah" value="{{ $m->jumlah }}"/>
           <input type="hidden"  name="waktu" value="{{ date("Y-m-d") }}"/>
           @endforeach
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Masukan jumlah uang: </label>
            <div class="col-sm-10 mt-3">
              <input type="number" class="form-control" id="basic-default-name" name="total" placeholder="100.000"/>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="basic-default-name">Metode pembayaran yang tersedia:</label>
            <div class="col-sm-10 mt-3">
                <select class="form-select" id="exampleFormControlSelect1" name="metode_pembayaran" aria-label="Default select example">
                    
                       <option value="cash">Cash</option>
                    

                      
                     </select>
            </div>
          </div>
          

        
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  
@endsection