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
                                        <li><a href="{{url('about')}}" style="color: #ff5c97;">About MGM</a></li>
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
                                        <li><a href="{{url('about')}}" style="color: #ff5c97;">About MGM</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3">
                            <div class="header-right-btn f-right d-none d-lg-block">
                                <a href="{{url('pengaduan')}}" class="btn header-btn">LAPOR</a>
                                <a href="{{url('profile')}}"class="btn header-btn small" style=";min-width: 5px;min-height: 5px;width: 40px;font-size: 18px;height: 40px;padding: 10px" ><i class="fa fa-user text-center"></i></a>
                                <a href="{{ route('logout') }}"   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn header-btn small" style=";min-width: 5px;min-height: 5px;width: 40px;font-size: 18px;height: 40px;padding: 10px" ><i class="fa fa-sign-out-alt text-center"></i></a>
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
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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
            .services-area{
                padding-top: 160px;
            }
            .blog_area{
                margin-top: -1%!important;
                padding-top: 0px;
            }
        </style>
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <span>Tentang mgm</span>
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
                  <div class="feature-img mx-auto" align="center">
                     <iframe width="720" height="420" src="https://www.youtube.com/watch?v=pm7DuZ0pg1g" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                  </div>
                  <div class="blog_details text-justify">
                     <p class="excert">
                      Pengelolaan pengaduan pelayanan publik di setiap organisasi penyelenggara di Indonesia belum terkelola secara efektif dan terintegrasi. Masing-masing organisasi penyelenggara mengelola pengaduan secara parsial dan tidak terkoordinir dengan baik. Akibatnya terjadi duplikasi penanganan pengaduan, atau bahkan bisa terjadi suatu pengaduan tidak ditangani oleh satupun organisasi penyelenggara, dengan alasan pengaduan bukan kewenangannya. Oleh karena itu, untuk mencapai visi dalam good governance maka perlu untuk mengintegrasikan sistem pengelolaan pengaduan pelayanan publik dalam satu pintu. Tujuannya, masyarakat memiliki satu saluran pengaduan secara Nasional.
                     </p>
                     <p>
                       Untuk itu Pemerintah Republik Indonesia membentuk Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional (SP4N) - Layanan Aspirasi dan Pengaduan Online Rakyat (LAPOR!) adalah layanan penyampaian semua aspirasi dan pengaduan masyarakat Indonesia melalui beberapa kanal pengaduan yaitu website www.lapor.go.id, SMS 1708, twitter @lapor1708 dan aplikasi Android. Lembaga pengelola SP4N-LAPOR! adalah Kementerian Pendayagunaan Aparatur Negara dan Reformasi Birokrasi (Kementerian PANRB) sebagai Pembina Pelayanan Publik, Kantor Staf Presiden (KSP) sebagai Pengawas Program Prioritas Nasional dan Ombudsman Republik Indonesia sebagai Pengawas Pelayanan Publik. LAPOR! telah ditetapkan sebagai Sistem Pengelolaan Pengaduan Pelayanan Publik Nasional (SP4N) berdasarkan Peraturan Presiden Nomor 76 Tahun 2013 dan Peraturan Menteri Pendayagunaan Aparatur Negara dan Reformasi Birokrasi Nomor 3 Tahun 2015.
      
                     </p>
                     <p>
                         SP4N-LAPOR! dibentuk untuk merealisasikan kebijakan “no wrong door policy” yang menjamin hak masyarakat agar pengaduan dari manapun dan jenis apapun akan disalurkan kepada penyelenggara pelayanan publik yang berwenang menanganinya. SP4N bertujuan agar:
                        
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;1. Penyelenggara dapat mengelola pengaduan dari masyarakat secara sederhana, cepat, tepat, tuntas, dan terkoordinasi dengan baik;</p>                            
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;2. Penyelenggara memberikan akses untuk partisipasi masyarakat dalam menyampaikan pengaduan; dan</p>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;3. Meningkatkan kualitas pelayanan publik.
                            </p>                        
                            <p>
                                Jumlah pelapor per Januari 2019 adalah sebanyak 801.257 pengguna. Total laporan yang telah masuk sebanyak 1.389.891. Sumber laporan terbanyak melalui website diikuti oleh SMS, twitter dan aplikasi mobile
                            </p>
                     </p>
                <p class="text-center font-weight-bold">“Berani LAPOR! Untuk Pelayanan Publik yang Lebih Baik”</p>
                  </div>
               </div>

            </div>
         </div>
      </div>
   </section>
        <!-- have-project End -->

    </main>
@endsection