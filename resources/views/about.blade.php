@extends('layouts.home')
@section('content')
<header>
    <!-- Header Start -->
    <div class="header-area header-transparrent ">
        <div class="main-header header-sticky">
            <div class="container">
                <div class="row align-items-center">
                    <!-- Logo -->
                    <div class="col-xl-2 col-lg-2 col-md-1">
                        <div class="logo">
                            <a href="{{url('/')}}"><img src="assets/img/logo/mgm-light.png" alt="" height="60"></a>
                        </div>
                    </div>

                    @guest
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <!-- Main-menu -->
                        <div class="main-menu f-left d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{url('/')}}"> Home</a></li>
                                    <li><a href="{{url('about')}}" style="color: #ff5c97;">About Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2 col-md-3">
                        <div class="header-right-btn f-right d-none d-lg-block">
                            <a href="{{url('login-user')}}" class="btn header-btn">MASUK</a>
                        </div>
                    </div>
                    @else
                    <div class="col-xl-7 col-lg-7 col-md-7">
                        <!-- Main-menu -->
                        <div class="main-menu f-left d-none d-lg-block">
                            <nav>
                                <ul id="navigation">
                                    <li><a href="{{url('home')}}"> Home</a></li>
                                    <li><a href="{{url('about')}}" style="color: #ff5c97;">About Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3">
                        <div class="header-right-btn f-right d-none d-lg-block">
                            <a href="{{url('pengaduan')}}" class="btn header-btn">LAPOR</a>
                            <a href="{{url('profile')}}" class="btn header-btn small" style=";min-width: 5px;min-height: 5px;width: 40px;font-size: 18px;height: 40px;padding: 10px"><i class="fa fa-user text-center"></i></a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn header-btn small" style=";min-width: 5px;min-height: 5px;width: 40px;font-size: 18px;height: 40px;padding: 10px"><i class="fa fa-sign-out-alt text-center"></i></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </div>
                    {{-- <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                    </li> --}}
                    @endguest

                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>

<main>

    <!-- Slider Area Start-->
    <div class="services-area">
        <style>
            .services-area {
                padding-top: 160px;
            }

            .blog_area {
                margin-top: -1% !important;
                padding-top: 0px;
            }
        </style>
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <span>Tentang PT. Mulia Grand Manufacture</span>
                        <h2>APA ITU MGM ?</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Area End-->

    <!--================Blog Area =================-->

    <section class="blog_area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 posts-list">
                    <div class="single-post">
                        <div class="blog_details text-justify">
                            <p class="excert">
                                PT Mulia Grand Manufacture didirikan sejak Agustus 2015 di daerah Boboh - Menganti. Perusahaan kami bergerak dalam bidang produksi karton gelombang dan karton box. Melalui pengalaman dalam dunia karton box sejak tahun 1994, kami menghasilkan produk karton box dengan kualitas terbaik.
                            </p>
                            <p>
                                Untuk menjadi perusahaan produsen karton box terbaik, kami mengutamakan kualitas, layanan dan hubungan baik dengan pelanggan kami. Menggunakan teknologi mesin terbaru, kami memproduksi karton box untuk memenuhi kebutuhan customer kami, dengan harga yang kompetitif dan pengiriman tepat waktu.
                            </p>
                            <p>
                                Adapun visi kami adalah menjadi perusahaan karton box yang dikenal unggul melalui layanan dan kualitas melalui kerjasama dan kesejahteraan semua pihak. Oleh karena itu selalu melakukan perbaikan kinerja dan terbuka dalam inovasi menjadi misi kami.
                            </p>
                            <p class="text-center font-weight-bold">“Berani Beda Itu Baik !!”</p>
                        </div>
                        <div class="row w-100">
                            <div class="col-lg-6 my-4">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15831.82225414984!2d112.5833701!3d-7.2458976!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7800e57c76e355%3A0x9e56bbbb82bd5450!2sMulia%20Grand%20Manufacture!5e0!3m2!1sid!2sid!4v1694039929745!5m2!1sid!2sid" class="w-100" height="500" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                            <div class="col-lg-6 my-4 d-flex align-items-center">
                                <div>
                                    <h4>Lokasi Kami</h4>
                                    <p>Jl. Raya Boboh No.89, RT. 05/RW 03, Desa Boboh Kec. Menganti, Kabupaten Gresik, Jawa Timur 61174</p><br>
                                    <h4>Kontak</h4>
                                    <p>Email: info@muliagrand.com</p>
                                    <p style="line-height: 1em;">Phone : 031 7997 0889 | 031 7997 0689</p><br>
                                    <h4>Jam Buka</h4>
                                    <p>Senin sampai Jumat :
                                    <p style="line-height: 0.5em;">&emsp;08.00 am - 04.00 pm</p><br>
                                    <p>Sabtu :
                                    <p style="line-height: 0.5em;">&emsp;08.00 am - 01.30 pm</p>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
    </section>
    <!-- have-project End -->

</main>
@endsection