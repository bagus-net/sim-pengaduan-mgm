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
                                    <li><a href="{{url('about')}}">About Us</a></li>
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
                                    <li><a href="{{url('about')}}">About Us</a></li>
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
    <div class="slider-area ">
        <div class="slider-active">
            <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.png">
                <div class="container">
                    <div class="row d-flex align-items-center">
                        <div class="col-lg-7 col-md-9 ">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay=".4s">Pengaduan Online Customers PT MGM</h1>
                                <p data-animation="fadeInLeft" data-delay=".6s">.</p>
                                <!-- Hero-btn -->
                                @guest
                                {{-- <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                        <a href="{{route('login')}}" class="btn hero-btn">LAPOR</a>
                            </div> --}}
                            @else
                            <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                <a href="{{url('pengaduan')}}" class="btn hero-btn">LAPOR</a>
                            </div>
                            @endguest
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                            <img src="assets/img/hero/hero_right.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slider slider-height d-flex align-items-center" data-background="assets/img/hero/h1_hero.png">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-7 col-md-9 ">
                        <div class="hero__caption">
                            <h1 data-animation="fadeInLeft" data-delay=".4s">We Collect<br> High Quality Leads</h1>
                            <p data-animation="fadeInLeft" data-delay=".6s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravi.</p>
                            <!-- Hero-btn -->
                            <div class="hero__btn" data-animation="fadeInLeft" data-delay=".8s">
                                <a href="industries.html" class="btn hero-btn">Contact Us</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="hero__img d-none d-lg-block" data-animation="fadeInRight" data-delay="1s">
                            <img src="assets/img/hero/hero_right.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Slider Area End-->
    <!-- Visit Stuffs Start -->
    <div class="visit-area fix visite-padding">
        <div class="container">
            <!-- Section-tittle -->
            {{-- <div class="row d-flex justify-content-center">
                    <div class="col-lg-6 pr-0">
                        <div class="section-tittle text-center">
                            <h2>Instansi Terhubung</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid p-0">
                <div class="row ">
                    <div class="col-lg-3 col-md-4">
                        <div class="single-visited mb-30">
                            <div class="visited-img">
                                <img src="assets/img/visit/visit_1.jpg" alt="">
                            </div>
                            <div class="visited-cap">
                                <h3><a href="https://bogorkab.go.id/" target="_blank">bogorkab.go</a></h3>
                                <p>Portal Kabupaten Bogor</p>
                            </div>
                        </div>
                    </div> 
                     <div class="col-lg-3 col-md-4">
                        <div class="single-visited mb-30">
                            <div class="visited-img">
                                <img src="assets/img/visit/visit_2.jpg" alt="">
                            </div>
                            <div class="visited-cap">
                                <h3><a href="https://jabarprov.go.id/" target="_blank">jabarprov.go</a></h3>
                                <p>Provinsi Jawa Barat</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4">
                        <div class="single-visited mb-30">
                            <div class="visited-img">
                                <img src="{{asset('upload/69010_medium_IMG-20190806-WA0028.jpg')}}" alt="">
        </div>
        <div class="visited-cap">
            <h3><a href="https://kotabogor.go.id/" target="_blank">kotabogor.go</a></h3>
            <p>Kota Bogor</p>
        </div>
    </div>
    </div>
    <div class="col-lg-3 col-md-4">
        <div class="single-visited mb-30">
            <div class="visited-img">
                <img src="{{asset('upload/unnamed.jpg')}}" alt="">
            </div>
            <div class="visited-cap">
                <h3><a href="https://www.lapor.go.id/" target="_blank">lapor.go</a></h3>
                <p>Pengaduan Masyarakat</p>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div> --}}
    <!-- Visit Stuffs Start -->
    <!-- Testimonial Start -->
    <div class="testimonial-area">
        <div class="container">
            <div class="testimonial-main">
                <!-- Section-tittle -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-5  col-md-8 pr-0">
                        <div class="section-tittle text-center">
                            <h2>Tokoh Pendukung</h2>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-10 col-md-9">
                        <div class="h1-testimonial-active">
                            <!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center  justify-content-center">
                                        <div class="founder-img">
                                            <img src="assets/img/testmonial/testimonial.jpg" alt="">
                                        </div>
                                        <div class="founder-text"><br>
                                            <span>Bpk Arifin</span>
                                            <p>Walikota Bogor</p>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- Single Testimonial -->
                            <div class="single-testimonial text-center">
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                        <div class="founder-img">
                                            <img src="assets/img/testmonial/yasin.jpg" alt="">
                                        </div>
                                        <div class="founder-text"><br>
                                            <span>Ade Yasin</span>
                                            <p>Bupati Bogor</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-testimonial text-center">
                                <div class="testimonial-caption ">
                                    <div class="testimonial-top-cap">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis. </p>
                                    </div>
                                    <!-- founder -->
                                    <div class="testimonial-founder d-flex align-items-center  justify-content-center">
                                        <div class="founder-img">
                                            <img src="assets/img/testmonial/jm.jpg" alt="">
                                        </div>
                                        <div class="founder-text"><br>
                                            <span>Julia Mansyur</span>
                                            <p>Laboran RPL Wikrama</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
    <!-- Tips Triks Start -->

    <!-- Tips Triks End -->
    <!-- have-project Start-->
    <div class="have-project">
        <br><br><br><br>
        <div class="container">
            <div class="haveAproject" data-background="assets/img/team/have.jpg">
                <div class="row d-flex align-items-center">
                    <div class="col-xl-7 col-lg-9 col-md-12">
                        <div class="wantToWork-caption">
                            <h2>Memiliki Saran?</h2>
                            <p>Demi tersampainya aplikasi yang sempurna berdasarkan ide dan saran anda , kami sangat mengaharapkan kritik atau saran yang bersifat membangun.</p>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-3 col-md-12">
                        <div class="wantToWork-btn f-right">
                            <a href="mailto:itmuliagrand@gmail.com" class="btn btn-ans">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- have-project End -->

</main>

@endsection