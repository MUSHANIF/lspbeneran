<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti tiket | Sitravel</title>
    <link rel="stylesheet" href="{{ asset('assets/css/stylebukti.css') }}">
</head>
<body>
    @foreach ($cart as $key)
    @for ($i = 0; $i < $key->jumlah; $i++)
        
 
    <div class="cardWrap">
    
            
     
        <div class="card cardLeft">
          <h1>Tiket <span>{{ $key->jns->name }}</span></h1>
          <div class="title">
            <h2>{{ $key->cart->name }}</h2>
            <span>Layanan</span>
          </div>
          <div class="name">
            <h2>{{ $key->waktu }}</h2>
            <span>Waktu</span>
          </div>
          <div class="seat">
            <h2>Rp. {{ number_format($key->cart->harga, 0, '', '.')  }}</h2>
            <span>Harga</span>
          </div>
          <div class="time">
            <h2>{{ $key->trans->metode_pembayaran }}</h2>
            <span>Metode pembayaran</span>
          </div>
          
        </div>
        <div class="card cardRight">
          <div class="eye"></div>
          <div class="number">
            
            <h3>{{ rand(200, 300) }}</h3>
            <span>seat</span>
          </div>
          <div class="barcode"></div>
        </div>
      
      </div>
      @endfor
      @endforeach
</body>
</html>