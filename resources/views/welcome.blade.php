@php
    $today = date("Y-m-d");                
@endphp
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HOME | Sitravel</title>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/assets/splide.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />    
    <link rel="stylesheet" href="{{ asset('assets/css/LineIcons.3.0.css') }}" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />    
    <script src="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js
    "></script>
    <link href="
    https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css
    " rel="stylesheet">
    <link href="assets/image/logo.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous"
    />
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400&display=swap");
                    * {
            margin: 0;
            padding: 0;
            font-family: "Poppins", sans-serif;
            }
            body{
                align-items: center;
  justify-content: center;
  
            }
            .navbar{
                position: fixed;
            }
            .home{
                
            }
            .splide{
                padding-top: 5rem;
            margin-top: 35px;
            margin-bottom: 60px;
            }
        .home .kiri{
            padding-top: 5rem;
            margin-top: 35px;
        }
        .navbar .btn {
  display: inline-block;
  margin-left: 10px;
  padding: 10px 30px;
  border-radius: 6rem;
  background-color: #5BC0F8;
  font-size: 16px;
  color: #fff;
  cursor: pointer;
  box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
  transition: all 0.3s #86E5FF;
}

.navbar .btn:hover {
  transform: scale(1.1);
  background-color: #5BC0F8;
  color: #fff;
}
.splide img{
    width: 100%;
  
}
.card .card-title {
text-decoration: none
}
.card .card-text {
text-decoration: none
}
.card .card-img{
    width: 100%;
    height: 100px;
    
}
.single-product {
  border: 1px solid #eee;
  border-radius: 4px;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
  margin-top: 30px;
  -webkit-box-shadow: 0px 0px 20px #00000012;
  box-shadow: 0px 0px 20px #00000012;
  padding: 8px;
  background: #fff;
}

.single-product .product-image {
  overflow: hidden;
  position: relative;
}

.single-product .product-image .sale-tag {
  background: #f73232;
  border-radius: 2px;
  font-size: 12px;
  color: #fff;
  font-weight: bold;
  position: absolute;
  top: 0;
  padding: 5px 10px;
  left: 0;
  z-index: 22;
}

.single-product .product-image .new-tag {
  background: #0167F3;
  border-radius: 2px;
  font-size: 12px;
  color: #fff;
  font-weight: bold;
  position: absolute;
  top: 0;
  padding: 5px 10px;
  left: 0;
  z-index: 22;
}

.single-product .product-image .button {
  position: absolute;
  left: 50%;
  margin-bottom: 50px;
  -webkit-transform: translateX(-50%);
  transform: translateX(-50%);
  bottom: -60px;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
  opacity: 0;
  visibility: hidden;
  background-color: #0167F3;
  color: white;
}

.single-product .product-image .button .btn {
  padding: 12px 20px;
  font-size: 13px;
  font-weight: 600;
  width: 140px;
}

.single-product .product-image .button .btn i {
  font-size: 18px;
    position: relative;
    top: 2px;
}

.single-product .product-image img {
  width: 100%;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

.single-product:hover .product-image .button {
  bottom: 30px;
  opacity: 1;
  visibility: visible;
}

.single-product:hover .product-image img {
  -webkit-transform: scale(1.1);
  transform: scale(1.2);
}

.single-product .product-info {
  padding: 20px;
  background-color: #fff;
}

.single-product .product-info .category {
  color: #888;
  font-size: 13px;
  display: block;
  margin-bottom: 2px;
}

.single-product .product-info .title a {
  font-size: 16px;
  font-weight: 700;
  color: #081828;
}

@media only screen and (min-width: 768px) and (max-width: 991px),
(max-width: 767px) {
  .single-product .product-info .title a {
    font-size: 15px;
  }
}

.single-product .product-info .title a:hover {
  color: #0167F3;
}

.single-product .product-info .review {
  margin-top: 5px;
}

.single-product .product-info .review li {
  display: inline-block;
}

.single-product .product-info .review li i {
  color: #fecb00;
  font-size: 13px;
}

.single-product .product-info .review li span {
  display: inline-block;
  margin-left: 4px;
  color: #888;
  font-size: 13px;
}

.single-product .product-info .price {
  margin-top: 15px;
}

.single-product .product-info .price span {
  font-size: 17px;
  font-weight: 700;
  color: #0167F3;
  display: inline-block;
}

.single-product .product-info .price .discount-price {
  margin: 0;
  color: #aaaaaa;
  text-decoration: line-through;
  font-weight: normal;
  margin-left: 10px;
  font-size: 14px;
  display: inline-block;
}

/* End Single Product */
.trending-product {
margin-top: 40px;
  background-color: #f9f9f9;
}

.trending-product .section-title {
  margin-bottom: 20px;
}
.shipping-info {
  
  padding: 50px 0;
}

.shipping-info ul {
  display: inline-block;
  width: 100%;
  margin-bottom: 0px;
  align-content: center
}

.shipping-info li {
  list-style: none;
  float: left;
  width: 25%;
  padding: 30px 40px;
  border: 1px solid #eee;
  text-align: center;
  -webkit-transition: all 0.4s ease;
  transition: all 0.4s ease;
}

@media only screen and (min-width: 768px) and (max-width: 991px) {
  .shipping-info li {
    width: 50%;
    display: flex;
    align-content: center;
  }
}

@media (max-width: 767px) {
  .shipping-info li {
    width: 100%;
  }
}

.shipping-info li:hover {
  background-color: #fff;
}

.shipping-info .media-icon {
  margin-bottom: 15px;
}

.shipping-info .media-icon i {
  color: #0167F3;
  font-size: 35px;
}

.shipping-info .media-body {
  padding-bottom: 0px;
}

.shipping-info .media-body h5 {
  font-size: 15px;
  margin: 0px;
  font-weight: 600;
  color: #081828;
}

.shipping-info .media-body span {
  font-size: 13px;
  margin-top: 2px;
  color: #777;
}
.testimoni  .card{
  margin-top: 20px;
  justify-content: center;
  align-items: center;
  
}
.testimoni  .card .card-im{
  width: 80px;
    height: 80px;
    margin: auto;
    border: 2px solid #d9dadb;
    border-radius: 100px;
  
}
.testimoni .card .card-body .card-text{
  font-size: 15px;
  text-align: center;
}
.testimoni .card .card-body .card-title{
  font-size: 17px;

  font-weight: 700;
  text-align: center;
  
}
@media (max-width: 767px) {
  .testimoni  .card{
    margin: 0 auto;
  }
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  </head>
  <body>
    @include('sweetalert::alert')
    <nav class="navbar navbar-expand-lg bg-trasparent fixed-top shadow-lg p-3 mb-5 bg-body-tertiary rounded ">
        <div class="container">
          <a class="navbar-brand" href="#"></a> <img src="{{ asset('assets/image/logo.png') }}" width="150px" alt="">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav  mx-auto text-center">
            
              <li class="nav-item  mx-3">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>                        
              <li class="nav-item mx-3">
                <a class="nav-link" href="#paket">Paket</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="#info">Info & Contact</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="#testimoni">Testimonial</a>
              </li>
            </ul>
            <ul class="navbar-nav  ">
              <li class="nav-item dropdown">
                @auth
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Selamat datang  {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        @can('superadmin')
                        <li><a class="dropdown-item" href="{{ route('dashboardsuperadmin') }}">Dashboard</a></li>
                        @elsecan('user')
                        <li><a class="dropdown-item" href="{{ route('keranjang',Auth::id()) }}">Keranjang</a></li>
                        @elsecan('admin')
                        <li><a class="dropdown-item" href="{{ route('dashboardAdmin') }}">Dashboard</a></li>
                        @endcan
                      
                      
                   
                      <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                        </form></li>
                    </ul>
                    @else
                    <a href="{{ route('login') }}" class="btn rounded d-flex justify-content-center mx-auto text-center ">Get started</a>
                    
                @endauth

                
                    
                
            
               
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <section class="splide" aria-labelledby="carousel-heading">
        
      
        <div class="splide__track " style="width: 100%; height: 100%; ">
              <ul class="splide__list">
                <li class="splide__slide"><img src="/assets/image/qw.jpg" alt=""></li>
                  <li class="splide__slide"><img src="/assets/image/er.jpg" alt=""></li>
                  <li class="splide__slide"><img src="/assets/image/ee.jpg" alt=""></li>                  
                  <li class="splide__slide"><img src="/assets/image/ww.jpg" alt=""></li>   
                  
              </ul>
        </div>
      </section>
      <section id="info" class="shipping-info">
        <div class="container justify-center">
            <ul>
                
                <li>
                    <div class="media-icon">
                        <i class="lni lni-delivery"></i>
                    </div>
                    <div class="media-body">
                        <h5>Registrasi</h5>
                        <span>Pastikan anda memiliki akun!</span>
                    </div>
                </li>
             
                <li>
                    <div class="media-icon">
                        <i class="lni lni-reload"></i>
                    </div>
                    <div class="media-body">
                        <h5>Pilih destinasi</h5>
                        <span>Pilihan paket destinasi kami pasti bagus</span>
                    </div>
                </li>
                <li>
                  <div class="media-icon">
                      <i class="lni lni-delivery"></i>
                  </div>
                  <div class="media-body">
                      <h5>Pembayaran</h5>
                      <span>Bayar paket yang sudah di tentukan</span>
                  </div>
              </li>
              <li>
                <div class="media-icon">
                    <i class="lni lni-delivery"></i>
                </div>
                <div class="media-body">
                    <h5>Nikmati perrjalanan</h5>
                    <span>Nikmati pernjalan yang aman dan nyaman</span>
                </div>
            </li>
            </ul>
        </div>
    </section>
      
      <section id="paket" class="trending-product section" style="margin-top: 40px; padding: 40px;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center">
                        
                            <h4 class="fw-semibold ">Paket yang tersedia</h4>
                            
                        
                        <p>Kami selalu menyediakan paket - paket pilihan dengan kualitas terbaik!</p>
                    </div>
                </div>
            </div>
            <div class="row">
              @foreach ($data as $dat )
                
              
                <div class="col-lg-4 col-md-6 col-12">
                    
                    <div class="single-product">
                        <div class="product-image">
                            <img src="/assets/images/layanan/{{ $dat->image }}" alt="#">
                            <div class="button">
                              {{-- <a id="pesan"  data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-userid="{{ Auth::id() }}"
                                data-jnsid="{{ $dat->layanan->id }}"
                                data-layananid="{{ $dat->id }}"
                                data-waktu = "{{ $today }}"
                                class="btn"><i class="lni lni-cart"></i>
                                Add to Cart 
                              </a>
                                --}}
                              @auth
                              <a href="{{ route('detail',$dat->id) }}" class="btn"><i class="bx bx-category icon"></i>
                                Detail </a>
                              @else
                              <a id="pesan"  data-bs-toggle="modal" data-bs-target="#exampleModal"
                              
                                class="btn"><i class="lni lni-cart"></i>
                               Detail
                              </a>
                               
                              @endauth
                                
                            </div>
                        </div>
                        <div class="product-info">
                            <span class="category">{{ $dat->layanan->name }}</span>
                            <h4 class="title">
                                <a href="product-grids.html" style="text-decoration: none;">{{ $dat->name }}</a>
                            </h4>
                            <h4 class="price">
                              @foreach ($dat->kurs as $kue)
                              <span>Tersisa {{ $kue->stok }} Tiket!</span>
                              @endforeach
                          
                          </h4>
                            <ul class="review">
                                <li><i class="lni lni-star-fill"></i></li>
                                <li><i class="lni lni-star-fill"></i></li>
                                <li><i class="lni lni-star-fill"></i></li>
                                <li><i class="lni lni-star-fill"></i></li>
                                <li><i class="lni lni-star-empty"></i></li>
                                <li><span>4.0 Review(s)</span></li>
                            </ul>
                            <div class="price">
                                <span>Rp. {{number_format($dat->harga, 0, '', '.') }} </span>
                            </div>
                        </div>
                    </div>
                    
                </div>
                @endforeach
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                @if ($user)
                
            @else
            <h1 class="modal-title fs-5" id="exampleModalLabel">Pesan</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
            
              <h2>Silahkan login atau register terlebih dahulu!</h2>
            
  
                 
               @endif
              </div>
            </div>
          </div>
        </div>
    </section>
    <section class="testimoni" id="testimoni" style="margin-top: 40px; padding-top: 40px;">
      <div class="container">
        <div class="row">
          <div class="col-12">
              <div class="section-title text-center">                  
                      <h4 class="fw-semibold ">Testimonial</h4>                                        
                  <p>Apa saja kata customer kami yang sudah memakai jasa kami?</p>
              </div>
          </div>
      </div>
        <div class="row ftco-animate">
          <div class="col-md-12 col-sm-12">
            <div class="carousel-testimony owl-carousel ftco-owl">             
              <div class="card d-flex justify-content-center align-items-center" style="width: 18rem; padding: 10px;">
                <img src="{{ asset('assets/images/profile/person_1.jpg') }}" class="card-im justify-content-center" alt="...">
                <div class="card-body">
                  <p class="card-text">Keren banget website nya, mesen nya juga mudah,saran nya sih tampilan nya harus di buat dengan baik lagi</p>
                  <h2 class="card-title">Mumus</h2>
                </div>
              </div>
                <div class="card d-flex justify-content-center align-items-center" style="width: 18rem; padding: 10px;">
                <img src="{{ asset('assets/images/profile/ceritanya.jpg') }}" class="card-im justify-content-center" alt="...">
                <div class="card-body">
                  <p class="card-text">Website ini membantu saya dalam mencari destinasi dan wisata yang indah,dengan aksen mudah melalui website ini , pokok nya masyaAllah bgt!</p>
                  <h2 class="card-title">Dedev</h2>
                </div>
              </div>
              <div class="card d-flex justify-content-center align-items-center" style="width: 18rem; padding: 10px;">
                <img src="{{ asset('assets/images/profile/fahregi.jpeg') }}" class="card-im justify-content-center" alt="...">
                <div class="card-body">
                  <p class="card-text">Keren sih web nya,mesen nya juga enak , bintang 5 lah ini,Yang bikin web juga keren,sip</p>
                  <h2 class="card-title">Fahregi203</h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section>
    <section id="footer" >
  {{-- <footer class="text-center " style="margin-top: 50px; margin-bottom: 10px; padding-top: 30px">
    <hr>
    <p>Copyright &copy; 2023 By Sitravel</p>

</footer> --}}

<footer class="text-center text-lg-start bg-light text-muted">
  
  <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
    
   
    

    
    <div>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-facebook-f"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-twitter"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-google"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-instagram"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-linkedin"></i>
      </a>
      <a href="" class="me-4 text-reset">
        <i class="fab fa-github"></i>
      </a>
    </div>
    
  </section>
  

  
  <section class="">
    <div class="container text-center text-md-start mt-5">
      
      <div class="row mt-3">
        
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          
          <h6 class="text-uppercase fw-bold mb-4">
            <img src="{{ asset('assets/image/logo.png') }}" width="150px" alt="">
          </h6>
          <p>
            Sitravel adalah perusahaan berbasis web yang bertujuan untuk memudahkan anda dalam memesan tiket kemanapun tujuan anda.
          </p>
        </div>


        
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          
          <h6 class="text-uppercase fw-bold mb-4">
            Jenis layanan
          </h6>
          <p>
            <a href="#!" class="text-reset">Kereta</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Pesawat</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Bus</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Kapal</a>
          </p>
        </div>
      

      
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          
          <h6 class="text-uppercase fw-bold mb-4">
            Fitur
          </h6>
          <p>
            <a href="#!" class="text-reset">Home</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Paket</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Info & Contact</a>
          </p>
          <p>
            <a href="#!" class="text-reset">Testimonial</a>
          </p>
        </div>
      

        
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          
          <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
          <p><i class="fas fa-home me-3"></i>Jl sudirman thamrin no 34, Jakarta selatan lt 23</p>
          <p>
            <i class="fas fa-envelope me-3"></i>
           sitravel@gmail.com
          </p>
          <p><i class="fas fa-phone me-3"></i> +62 895 6170 36426</p>
          <p><i class="fas fa-print me-3"></i> + 62 895 3331 26291</p>
        </div>
        
      </div>
      
    </div>
  </section>
    
  <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
    © 2023 Copyright:
    <a class="text-reset fw-bold" href="#">Sitravel</a>
  </div>

</footer>

<script>
  $(document).ready(function(){
         $(document).on('click', '#pesan', function () {
          var userid = $(this).data('userid');
       var jnsid = $(this).data('jnsid');
       var layananid = $(this).data('layananid');
       var waktu = $(this).data('waktu');        
       $('#userid').attr('value',userid);
       $('#jnsid').attr('value',jnsid);
       $('#layananid').attr('value',layananid);
       $('#waktu').attr('value',waktu);                  
    });
  });

</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="/assets/owl.carousel.js"></script>
    <script src="/assets/splide.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js"></script>   
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>    
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous"></script>  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
  <script>
var splide = new Splide( '.splide', {
  type   : 'loop',
  padding: '5rem',
  focus  : 'center',  
  autoplay: true,
  interval: 1500,
  speed: 400,
} );

splide.mount();
  </script>
    <script>       
      var owl = $(".owl-carousel");
      owl.owlCarousel({
        autoplay: true,
        autoplayTimeout: 2000,
        loop: true,
        nav: false,
        margin: 100,
        responsive: {
          0: {
            items: 1,
          },
          600: {
            items: 2,
          },
          1000: {
            items: 3,
          },
        },
      });      
    </script>
</html>