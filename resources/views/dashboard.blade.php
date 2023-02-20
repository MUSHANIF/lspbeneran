@extends('layouts.dashboard')
@section('isi')
@can('admin')

<div class="col-xxl-4 col-md-4">
  <div class="card info-card sales-card">

    

    <div class="card-body">
      <h5 class="card-title">Transaksi<h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bx bxs-spreadsheet icon"></i>
        </div>
        <div class="ps-3">
          <h6>{{ $transaksi }}</h6>
       

        </div>
      </div>
    </div>

  </div>
</div>
<div class="col-xxl-4 col-md-4">
  <div class="card info-card sales-card">

    

    <div class="card-body">
      <h5 class="card-title">Layanan</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bx bx-collection icon"></i>
        </div>
        <div class="ps-3">
          <h6>{{ $layanan  }}</h6>
       

        </div>
      </div>
    </div>

  </div>
</div>

<div class="col-xxl-4 col-md-4">
  <div class="card info-card sales-card">

    

    <div class="card-body">
      <h5 class="card-title">Customers</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bx bxs-user icon"></i>
        </div>
        <div class="ps-3">
          <h6>{{ $user  }}</h6>
       

        </div>
      </div>
    </div>

  </div>
</div>


@elsecan('superadmin')
<div class="col-xxl-3 col-md-3">
  <div class="card info-card sales-card">

    

    <div class="card-body">
      <h5 class="card-title">Transaksi</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bx bxs-spreadsheet icon"></i>
        </div>
        <div class="ps-3">
          <h6>{{ $transaksi }}</h6>
       

        </div>
      </div>
    </div>

  </div>
</div>
<div class="col-xxl-3 col-md-3">
  <div class="card info-card sales-card">

    

    <div class="card-body">
      <h5 class="card-title">Layanan </h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bx bx-collection icon"></i>
        </div>
        <div class="ps-3">
          <h6>{{ $layanan  }}</h6>
       

        </div>
      </div>
    </div>

  </div>
</div>

<div class="col-xxl-3 col-md-3">
  <div class="card info-card sales-card">

    

    <div class="card-body">
      <h5 class="card-title">Admin  </h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bx bxs-user icon"></i>
        </div>
        <div class="ps-3">
          <h6>{{ $admin  }}</h6>
       

        </div>
      </div>
    </div>

  </div>
</div>
<div class="col-xxl-3 col-md-3">
  <div class="card info-card sales-card">    

    <div class="card-body">
      <h5 class="card-title">Customers</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bx bxs-user icon"></i>
        </div>
        <div class="ps-3">
          <h6>{{ $user  }}</h6>
       

        </div>
      </div>
    </div>

  </div>
</div>
@elsecan('user')
<div class="col-xxl-4 col-md-6">
  <div class="card info-card sales-card">

    

    <div class="card-body">
      <h5 class="card-title">Jumlah paket anda (Belum di bayar)</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-cart"></i>
        </div>
        <div class="ps-3">
          <h6>145</h6>
        

        </div>
      </div>
    </div>

  </div>
</div>


<div class="col-xxl-4 col-md-6">
  <div class="card info-card revenue-card">

   

    <div class="card-body">
      <h5 class="card-title">Jumlah paket anda (Sudah di bayar)</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-currency-dollar"></i>
        </div>
        <div class="ps-3">
          <h6>$3,264</h6>
      

        </div>
      </div>
    </div>

  </div>
</div>
@endcan
@endsection
