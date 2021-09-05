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
        <link rel="stylesheet" href="{{asset('ezone/assets/css/yulinar.css')}}">

        <style type="text/css">
            .logo-menu-wrapper{
            background-color: #6B8E23;
            font-family: "Open Sans", sans-serif;
            font-size: 12px;
            line-height: 29px;
            text-transform: uppercase;
            display: flex;
            justify-content: space-between;

            }

            input[type=radio] {
            border: 0px;
            width: 100%;
            height: 1em;
}
        </style>

        <script src="{{asset('ezone/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
    </head>
    <body>
              <!-- header start -->
              <header class="header-area wrapper-padding-2">
              <div id="main-menu" class="sticker header-sticky">
               
                    <div class="logo-menu-wrapper ">
                        <div class="logo-watch navbar-header">
                            <a class="navbar-brand" href=""><img src="ezone/assets/img/logo/logo-6.png" alt=""></a>
                        </div>
                        <div class="hamburger-wrapper">
                            <div class="hamburger-menu  " >
                                <nav class="" >
                                    <ul>
                                        <li><a href="{{ url('home#home-area')}}">HOME</a></li>
                                        <li><a href="{{ url('home#about-area')}}">TENTANG</a></li>
                                        <li><a href="{{ url('home#shop-area')}}">KATALOG</a></li>
                                        <li><a href="{{ url('home#contact-area')}}">KONTAK</a></li>
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
                           
                            <?php 
                            $pesanan_utama = \App\Models\Pesanan::where('user_id', Auth::user()->id)->where ('status', 0)->first();

                            if(!empty($pesanan_utama)){
                                $notif = \App\Models\PesananDetail::where('pesanan_id', $pesanan_utama->id)->count();
                            }
                          
                           ?>
                                <a class="icon-cart" href="{{ url('check-out') }}">
                                    <i class="pe-7s-shopbag"></i>
                                    @if(!empty($notif))
                                        <span class="badge badge-danger">{{ $notif }}</span>
                                        @endif
                                </a>
                               
                              
                              
                            
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
        <div id="about-area" class="watch-about-area bg-img ptb-150" style="background-image: url(ezone/assets/img/bg/8.jpg)">
            <div class="container">
        <div class="row">
    
            <div class="col-md-12 mt-3">
            <div class="card">
               
                <div class="card-body">
                    <div class="form-row">
                        
                        <h5 class="m-0 font-weight-bold text-success">Chekout Belanja</h5>
                        <!-- CARA NARUH KANAN TULISAN!!! -->
                        <!-- <h5 class="" text-align="right">djf</h5>     -->
                        </div>
                        
                        @if(!empty($pesanan))
                        <p align="right">Tanggal Pesan : {{$pesanan->tanggal_pesanan}}</p>
                        <table class="table table-bordered">
                            <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <!-- <th>Aksi</th> -->
                        </tr>
                    </thead>

                    <tbody>
                    <?php 
                    $no=1; 
                    ?>
                    @foreach($pesanan_details as $pesanan_detail)
                    <tr class="text-center">
                        <td>{{$no++}}</td>
                        <td>
                            <img src="{{ url('uploads')}}/{{$pesanan_detail->produk->foto_produk}}" alt="" width="50">
                        </td>
                        <td>{{ $pesanan_detail->produk->nama_produk}}</td>
                        <td>{{ $pesanan_detail->jumlah}} ikat</td>
                        <td>Rp. {{ number_format($pesanan_detail->produk->harga_produk)}}</td>
                        <td>Rp. {{ number_format($pesanan_detail->jumlah_harga)}}</td>
                        <!-- <td>
                            <form action="{{url('check-out')}}/{{$pesanan_detail->id}}" method="post">
                            @csrf
                            {{ method_field('DELETE') }}
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin akan menghapus data?');"><i class="pe-7s-trash"></i></button>
                            </form>
                        </td> -->
                    </tr>
                    </tbody>
                   
                    @endforeach
                    <tfoot>
                    <tr >
                        <th colspan="5">  Total Harga</th>
                        <th class="text-center">Rp. {{number_format($pesanan->jumlah_harga)}}</th>
                        <!-- <td class="text-center"> -->
                            <!-- <a href="{{ url('konfirmasi-check-out')}}" class="btn btn-success" onclick="return confirm('Anda yakin untuk Check Out produk?');">
                            <i class="fa fa-shopping-cart"></i> Check Out
                            </a> -->
                        <!-- </td> -->
                    </tr>
                   </tfoot>
                </table>
                @endif
                 
                    <div class="input-radio">
                       
                        <label for="payment-2">
                            <span></span>
                            Cash On Delivery
                        </label>
                        <div class="caption">
                            <p>Produk akan dikirim dalam waktu 24 jam setelah konfirmasi. Kami hanya menerima Cash on delivery saat ini. </p>
                        </div>
                </div>
                <a href="{{ url('konfirmasi-check-out')}}" class="btn btn-success" onclick="return confirm('Anda yakin untuk Check Out produk?');">
                            <i class="fa fa-shopping-cart"></i> Check Out
                            </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
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
