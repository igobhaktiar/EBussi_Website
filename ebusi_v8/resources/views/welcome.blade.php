<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>E-BUSI - eCommerce Kebun Inovasi</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{asset('ezone/assets/img/favicon.png')}}">
		
		<!-- all css here -->
        <link rel="stylesheet" href="{{asset('ezone/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{asset('ezone/assets/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('ezone/assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('ezone/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('ezone/assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('ezone/assets/css/pe-icon-7-stroke.css')}}">
        <link rel="stylesheet" href="{{asset('ezone/assets/css/icofont.css')}}">
        <link rel="stylesheet" href="{{asset('ezone/assets/css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{asset('ezone/assets/css/bundle.css')}}">
        <link rel="stylesheet" href="{{asset('ezone/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('ezone/assets/css/responsive.css')}}">
        <script src="{{asset('ezone/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
        <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
              <!-- header start -->
              <header class="header-area wrapper-padding-2">
            <div id="main-menu" class="sticker header-sticky">
                <div class="container-fluid">
                    <div class="logo-menu-wrapper">
                        <div class="logo-watch navbar-header">
                            <a class="navbar-brand" href=""><img src="ezone/assets/img/logo/logo-6.png" alt=""></a>
                        </div>
                        <div class="hamburger-wrapper">
                            <div class="hamburger-menu  " >
                                <nav class="">
                                    <ul>
                                        <li><a href="#home-area">HOME</a></li>
                                        <li><a href="#about-area">TENTANG</a></li>
                                        <li><a href="#shop-area">KATALOG</a></li>
                                        <li><a href="#contact-area">KONTAK</a></li>
                                    </ul>
                                </nav>
                                </div>
                                  </div>
                                <div class="furits-login-cart">
                            <div class="furits-login">
                            @guest
                            @if (Route::has('login'))
                                    <li>
                                        <a href="{{ route('login') }}">Login</a>
                                    </li>
                             @endif

                             @if (Route::has('register'))
                                    <li>
                                        <a href="{{ route('register') }}">Reg</a>
                                    </li>
                            @endif

                            @else

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                     <i class="pe-7s-user"></i> Profile
                                    </a>

                                    <a class="dropdown-item" href="{{ url('history') }}">
                                    <i class="pe-7s-note2"></i> Riwayat Pemesanan
                                    </a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="pe-7s-unlock"></i> {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                            
                            </div>

                            <div class="header-cart-4 furits-cart">
                            <?php 
                            // Solusi : digunkan percabangan
                            //seharusnya untuk mengakses halaman tidak diperlukan login, kecuali ingin pesan
                                
                            // $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where ('status', 0)->first();

                            // if(!empty($pesanan_utama)){
                            //     $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                            // }
                          
                           ?>
                           
                            
                                <a class="icon-cart" href="{{ url('check-out') }}">
                                    <i class="pe-7s-shopbag"></i>
                                    <!-- @if(!empty($notif))
                                        <span class="badge badge-danger">{{ $notif }}</span>
                                        @endif -->
                                </a>
                               
                              
                              
                            
                        </div>
                    </div>
                </div>
            </div>
            <!--Menu Mobile  -->
            <div class="mobile-menu-area handicraft-menu d-md-block col-md-12 col-lg-12 col-12 d-lg-none d-xl-none">
                            <div class="mobile-menu">
                                <nav id="mobile-menu-active">
                                    <ul class="menu-overflow">
                                  

                                        <li><a href="#home-area">HOME</a>
                                            
                                        </li>
                                        <li><a href="#about-area">TENTANG</a>
                                          
                                        </li>
                                        <li><a href="#shop-area">KATALOG</a>
                                          
                                        </li>
                                       
                                        <li><a href="#contact-area"> Contact  </a></li>
                                    </ul>
                                </nav>							
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
       
        <!-- header end -->
        <!-- slider start -->
        <div id="home-area" class="height-100vh bg-img watch-slider" style="background-image: url(ezone/assets/img/slider/10.jpg)">
            <div class="table">
                <div class="table-cell">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 align-items-center">
                                <div class="slider-text">
                                    <h2 class="tlt1">Sistem <br>Informasi <br>E-BUSI.</h2>
                                    <div class="button-set">
                                        
                                        <a class="furits-slider-btn btn-hover animated" href="#shop-area">Shop Now</a>
                                    </div>
                                </div>
                            </div>
                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about area start -->
        <div id="about-area" class="watch-about-area bg-img ptb-150" style="background-image: url(ezone/assets/img/bg/8.jpg)">
            <div class="container">
                <div class="watch-about-content text-center">
                    <img class="tilter" src="ezone/assets/img/banner/4.png" alt="" >
                    <h2>Kebun Inovasi Polije</h2>
                    <p>Kebun Inovasi bertujuan untuk menciptakan sumber daya manusia yang berkualitas. Beragam koleksi tanaman yang tersedia di Kebun Inovasi adalah semangka, melon, terong, bawang merah, jagung dan juga tanaman jeruk. Kegiatan pengelolaan lahan ini juga melibatkan instruktur yang ahli di bidang pertanian. Instruktur pertanian akan melakukan edukasi materi dan praktik langsung di lahan.</p>
                   
                </div>
            </div>
        </div>
        
        <!-- product area start -->
        <div id="shop-area" >
            <!-- product area start -->
        <div class="product-style-area gray-bg-4 pb-105">
            <div class="container-fluid">
                <div class="section-title-furits bg-shape text-center mb-80">
                    <img src="{{asset('ezone/assets/img/icon-img/49.png')}}" >
                    <h2>Katalog</h2>
                </div>
                <div class="product-fruit-slider owl-carousel">
                
                @foreach ($produks as $produk)
                    <div class="product-fruit-wrapper">
                        <div class="product-fruit-img">
                        @if($produk->stok == 0 || $produk->stok <= 0)
                        <div class="alert alert-warning" style="text-align: center;">Produk ini habis</div>
                        @endif

                        <!-- @if($produk->stok <= 3)
                        <div class="alert alert-warning" style="text-align: center;">Produk segera habis</div>
                        @endif -->
                            <a href="{{ url ('pesan') }}/{{$produk->id}}"> <img src="{{ url('uploads') }}/{{ $produk->foto_produk}}" ></a>
                            <div class="product-furit-action">
                            <!-- Berikan kondisi untuk stok menggunakan if -->
                                <!-- <a class="furit-animate-left" title="Add To Cart" href="{{ url ('keranjang_aksi') }}/{{$produk->id}}">
                                    <i class="pe-7s-cart"></i>
                                </a>
                                <a class="furit-animate-right" title="Detail" href="{{ url ('pesan') }}/{{$produk->id}}">
                                    <i class="pe-7s-info"></i>
                                </a> -->
                            </div>
                        </div>
                        <div class="product-fruit-content text-center">
                            <h4><a href="#">{{ $produk->nama_produk }}</a></h4>
                            <span>Rp. {{ number_format($produk->harga_produk)}}</span>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
        <!-- product area end -->
        <!-- video area start 
        <div id="video-area" class="video-area bg-img pt-140 pb-135" style="background-image: url(ezone/assets/img/bg/10.jpg)">
            <div class="container">
                <div class="row">
                    <div class="ml-auto col-lg-6">
                        <div class="watch-video-content">
                            <h2>Explore <br>Every part of this <br>Watch.</h2>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            <div class="video-btn">
                                <a class="video-popup" href="https://www.youtube.com/watch?v=wI4ocEF3Wfk"><i class="ti-control-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        features area start -->
       
      
    
        <!-- footer area start -->
        <footer id="contact-area" class="footer-area">
            <div class="footer-top-area pt-70 pb-35 wrapper-padding-5">
                <div class="container-fluid">
                    <div class="widget-wrapper">
                        <div class="footer-widget mb-30">
                            <a href="#home-area"><img src="ezone/assets/img/logo/2.png" alt=""></a>
                            
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Contact Info</h3>
                            <div class="footer-info-wrapper-3">
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Address: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p> Jl. Mastrip Kotak Pos 164 Jember, Jawa Timur <br>Indonesia</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>Phone: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p>089527534278 <br>+8801 (66) 223352333</p>
                                    </div>
                                </div>
                                <div class="footer-address-furniture">
                                    <div class="footer-info-icon3">
                                        <span>E-mail: </span>
                                    </div>
                                    <div class="footer-info-content3">
                                        <p><a href=""> Tosan@polije.ac.id</a> <br><a href="#"> domain@mail.info</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="footer-widget mb-30">
                            <h3 class="footer-widget-title-5">Map</h3>
                            <div class="form-group">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4696.704327963119!2d113.72202653559624!3d-8.15816096065096!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd695b617d8f623%3A0xf6c4437632474338!2sState%20Polytechnic%20of%20Jember!5e0!3m2!1sen!2sid!4v1605834966884!5m2!1sen!2sid" width="500" height="320" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom ptb-20 gray-bg-8">
                <div class="container">
                    <div class="row">
                        <div class="col-12 text-center">
                            <div class="copyright-furniture">
                                <p>Copyright © <a href="https://hastech.company/">HasTech</a> 2018 . All Right Reserved.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        
		
		
		
		
		
		
		
		
		
		<!-- all js here -->
        <script src="ezone/assets/js/vendor/jquery-1.12.0.min.js"></script>
        <script src="ezone/assets/js/popper.js"></script>
        <script src="ezone/assets/js/bootstrap.min.js"></script>
        <script src="ezone/assets/js/jquery.magnific-popup.min.js"></script>
        <script src="ezone/assets/js/isotope.pkgd.min.js"></script>
        <script src="ezone/assets/js/imagesloaded.pkgd.min.js"></script>
        <script src="ezone/assets/js/jquery.counterup.min.js"></script>
        <script src="ezone/assets/js/waypoints.min.js"></script>
        <script src="ezone/assets/js/ajax-mail.js"></script>
        <script src="ezone/assets/js/owl.carousel.min.js"></script>
        <script src="ezone/assets/js/plugins.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMlLa3XrAmtemtf97Z2YpXwPLlimRK7Pk"></script>
		<script>
            function init() {
                var mapOptions = {
                    zoom: 11,
                    scrollwheel: false,
                    center: new google.maps.LatLng(40.709896, -73.995481),
                    styles: [
                        {
                            "featureType": "administrative.locality",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "hue": "#2c2e33"
                                },
                                {
                                    "saturation": 7
                                },
                                {
                                    "lightness": 19
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "landscape",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "hue": "#ffffff"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": 100
                                },
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "poi",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "hue": "#ffffff"
                                },
                                {
                                    "saturation": -100
                                },
                                {
                                    "lightness": 100
                                },
                                {
                                    "visibility": "off"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "hue": "#bbc0c4"
                                },
                                {
                                    "saturation": -93
                                },
                                {
                                    "lightness": 31
                                },
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "road",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "hue": "#bbc0c4"
                                },
                                {
                                    "saturation": -93
                                },
                                {
                                    "lightness": 31
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "road.arterial",
                            "elementType": "labels",
                            "stylers": [
                                {
                                    "hue": "#bbc0c4"
                                },
                                {
                                    "saturation": -93
                                },
                                {
                                    "lightness": -2
                                },
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "road.local",
                            "elementType": "geometry",
                            "stylers": [
                                {
                                    "hue": "#e9ebed"
                                },
                                {
                                    "saturation": -90
                                },
                                {
                                    "lightness": -8
                                },
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        },
                        {
                            "featureType": "transit",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "hue": "#e9ebed"
                                },
                                {
                                    "saturation": 10
                                },
                                {
                                    "lightness": 69
                                },
                                {
                                    "visibility": "on"
                                }
                            ]
                        },
                        {
                            "featureType": "water",
                            "elementType": "all",
                            "stylers": [
                                {
                                    "hue": "#e9ebed"
                                },
                                {
                                    "saturation": -78
                                },
                                {
                                    "lightness": 67
                                },
                                {
                                    "visibility": "simplified"
                                }
                            ]
                        }
                    ]
                };
                var mapElement = document.getElementById('footer-map-2');
                var map = new google.maps.Map(mapElement, mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.709896, -73.995481),
                    map: map,
                    icon: 'ezone/assets/img/icon-img/46.png',
                    animation:google.maps.Animation.BOUNCE,
                    title: 'Snazzy!'
                });
            }
            google.maps.event.addDomListener(window, 'load', init);
		</script>
        <script src="ezone/assets/js/main.js"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        @include('sweet::alert')
    </body>
</html>
