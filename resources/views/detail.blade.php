@php
    $today = date("Y-m-d");                
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <title>Detail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
</head>
<body>
    <section class="item-details section">
        <div class="container">
          <div class="top-area">

            <div class="row align-items-center">
              <div class="col-lg-6 col-md-12 col-12">
                <div class="product-images">
               
                    
                  
                  <main id="gallery">
                    <div class="main-img">
                      
    

                      <img src="/assets/images/galeri/{{ $data->first()->image }}" id="current" alt="#" />
                      
                    </div>
                    <div class="images">
                      @foreach ($data as $key )
                      <img src="/assets/images/galeri/{{ $key->image }}" class="img" alt="#" />
                      @endforeach
                    </div>
                  </main>
                
                </div>
              </div>
             
              <div class="col-lg-6 col-md-12 col-12">
                <div class="product-info">
                  @foreach ($datas as $key )
                  <h2 class="title">{{ $key->name }}</h2>
                  <p class="category"><i class="lni lni-tag"></i>{{ $key->layanan->name }}</p>
                  <h3 class="price">Rp. {{number_format($key->harga, 0, '', '.') }}<span>Rp {{number_format($key->harga + 150000, 0, '', '.') }}</span></h3>
                  <p class="info-text">{{ $key->deskripsi }}</p>
               
                  <div class="row">
                    <div class="col-lg-12 col-12">
                      <div class="info-body">
                        <h4>Specifications</h4>
                        <ul class="normal-list">
                         
                          <li><span>Bahasa:</span> {{ $key->bahasa }}</li>
                          <li><span>Lokasi:</span> {{  $key->lokasi }} </li>
                          <li><span>Fitur:</span> {{  $key->fitur }} </li>
                       
                        </ul>
                        
                      </div>
                    </div>
                  </div>
                  @endforeach
                  <div class="row">
                    <form action="{{ route('tambah',Auth::user()->id) }}" method="POST" >
                      @csrf
                      @foreach ($tambah as $dat )                                              
                      <input type="hidden" id="userid" name="userid" value="{{ Auth::user()->id }}">
                      <input type="hidden" id="jnsid" name="jnsid" value="{{ $dat->layanan->id }}">
                      <input type="hidden" id="layananid" name="layananid" value="{{ $dat->id }}">                                                            
                      <input type="hidden" id="waktu" name="waktu" value="{{ $today }}">
                      @endforeach
                    <div class="col-lg-4 col-md-4 col-12">
                      <div class="form-group quantity">
                        <label for="color">Quantity</label>
                        <select class="form-control" name="nomor">
                          <option  value="1">1</option>
                          <option  value="2">2</option>
                          <option  value="3">3</option>
                          <option  value="4">4</option>
                          <option  value="5">5</option>
                          <option  value="6">6</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="bottom-content">
                    <div class="row align-items-end">
                      <div class="col-lg-4 col-md-4 col-12">
                        <div class="button cart-button">
                          <button type="submit" class="btn" style="width: 100%">Add to Cart</button>
                        </div>
                      </div>
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
           
          </div>
          {{-- <div class="product-details-info">
            <div class="single-block">
              <div class="row">
                <div class="col-lg-6 col-12">
                  <div class="info-body custom-responsive-margin">
                    <h4>Details</h4>
                    <p>
                      Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat.
                    </p>
                    <h4>Features</h4>
                    <ul class="features">
                      <li>Capture 4K30 Video and 12MP Photos</li>
                      <li>Game-Style Controller with Touchscreen</li>
                      <li>View Live Camera Feed</li>
                      <li>Full Control of HERO6 Black</li>
                      <li>Use App for Dedicated Camera Operation</li>
                    </ul>
                  </div>
                </div>
                <div class="col-lg-6 col-12">
                  <div class="info-body">
                    <h4>Specifications</h4>
                    <ul class="normal-list">
                      <li><span>Weight:</span> 35.5oz (1006g)</li>
                      <li><span>Maximum Speed:</span> 35 mph (15 m/s)</li>
                      <li><span>Maximum Distance:</span> Up to 9,840ft (3,000m)</li>
                      <li><span>Operating Frequency:</span> 2.4GHz</li>
                      <li><span>Manufacturer:</span> GoPro, USA</li>
                    </ul>
                    <h4>Shipping Options:</h4>
                    <ul class="normal-list">
                      <li><span>Courier:</span> 2 - 4 days, $22.50</li>
                      <li><span>Local Shipping:</span> up to one week, $10.00</li>
                      <li><span>UPS Ground Shipping:</span> 4 - 6 days, $18.00</li>
                      <li><span>Unishop Global Export:</span> 3 - 4 days, $25.00</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div> --}}
        </div>
      </section>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script src="jquery/jquery.min.js"></script>
      <script type="text/javascript">
        const current = document.getElementById("current");
        const opacity = 0.6;
        const imgs = document.querySelectorAll(".img");
        imgs.forEach((img) => {
          img.addEventListener("click", (e) => {
            imgs.forEach((img) => {
              img.style.opacity = 1;
            });
            current.src = e.target.src;     
            e.target.style.opacity = opacity;
          });
        });
      </script>
</body>
</html>