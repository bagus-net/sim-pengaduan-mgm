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
                                        <li><a href="{{url('/')}}" style="color: #ff5c97;"> Home</a></li>
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
                                        <li><a href="{{url('home')}}" style="color: #ff5c97;"> Home</a></li>
                                        <li><a href="{{url('about')}}">About Us</a></li>
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

       <!-- Slider Area Start-->
       <!-- Slider Area Start-->
    <div class="services-area">
        <style>
            .services-area{
                padding-top: 160px;
            }
            .blog_area{
              padding-top: 2%; 
            }
        </style>
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <span>Lapor</span>
                        <h2>Detail Laporan</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!-- Slider Area End-->
    
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="feature-img">
                     <img class="img-fluid" src="{{asset('upload/'.$pengaduan->foto)}}" alt="">
                  </div>
                  <div class="blog_details">
                     <h2>{{$pengaduan->judul}}
                     </h2>
                     <ul class="blog-info-link mt-3 mb-4">
                        <li><a href="#"><i class="fa fa-user"></i> {{$pengaduan->kategori}} </li>
                        <li><a href="#coment"><i class="fa fa-comments"></i>  Comments</a></li>
                     </ul>
                    {!! $pengaduan->isi_laporan !!}
                  </div>
               </div>
               <div class="navigation-top">
                  <div class="d-sm-flex justify-content-between text-center">
                     <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span>
                        people support this</p>
                     <div class="col-sm-4 text-center my-2 my-sm-0">
                        <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                     </div>
                     <!-- <ul class="social-icons">
                        <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fab fa-behance"></i></a></li>
                     </ul> -->
                  </div>
               </div>
               @if($pengaduan->status == "proses")
               <div class="blog-author bg-danger rounded">
                  <div class="media align-items-center " >
                     <img src="{{asset('upload/avatar.png')}}" alt="">
                     <div class="media-body">
                           <h4 class="text-white">Petugas</h4>
                        <p class="text-white">Laporan Anda Sedang Di Proses , Terimakasih Telah Menunggu</p>
                     </div>
                  </div>
               </div>
               @elseif($pengaduan->status == "selesai")
               <div class="blog-author bg-primary rounded">
                  <div class="media align-items-center " >
                     <img src="{{asset('upload/avatar.png')}}" alt="">
                     <div class="media-body">
                           <h4 class="text-white">Petugas</h4>
                        <p class="text-white">Laporan Telah Selesai Ditindak Lanjuti, Terimakasih Telah Melapor</p>
                     </div>
                  </div>
               </div>
               @elseif($pengaduan->status == "verified")
               <div class="blog-author bg-warning rounded">
                  <div class="media align-items-center " >
                     <img src="{{asset('upload/avatar.png')}}" alt="">
                     <div class="media-body">
                           <h4 class="text-white">Petugas</h4>
                        <p class="text-white">Laporan Anda Sedang Di Verifikasi , Terimakasih Telah Melapor</p>
                     </div>
                  </div>
               </div>
               @endif
               <div class="comments-area" id="coment">
                  @foreach($komentar as $id)
                    @if($id->id_pengaduan == $pengaduan->id)
                           <h4> Komentar</h4>
                        @break
                    @endif
                  @endforeach
                  
                  @foreach($komentar as $komen)
                  @if($komen->id_pengaduan == $pengaduan->id)

                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="{{asset('upload/'.$komen->foto)}}" alt="">
                           </div>
                           <div class="desc" w>
                              <p class="comment">
                                 {{$komen->komentar}}
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">{{$komen->name}}</a>
                                    </h5>
                                    <p class="date">{{$komen->created_at->format('M d, Y')}} at {{$komen->created_at->format('h:i')}}</p>
                                 </div>
                                 <div class="reply-btn" style="float: right;">
                                    <a href="#buat"  style="float: right;" class="btn-reply text-uppercase">reply</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  @endforeach
               </div>
               <div class="comment-form">
                  <h4 id="buat">Leave a Reply</h4>
                  <div class="form-contact comment_form" action="#" id="commentForm">
                    <form action="{{route('home.komentar')}}" method="POST">
                      @csrf
                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <textarea class="form-control w-100" name="komentar" id="comment" cols="30" rows="9"
                                 placeholder="Write Comment"></textarea>
                           </div>
                           <input type="text" name="foto" value="{{auth()->user()->foto}}" hidden="">
                           <input type="text" name="name" value="{{auth()->user()->name}}" hidden="">
                           <input type="text" name="id_pengaduan" value="{{$pengaduan->id}}" hidden="">
                        </div>
                     </div>
                     <div class="form-group">
                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send Message</button>
                     </div>
                    </form>
                  </div>
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <form action="#">
                        <div class="form-group">
                           <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder='Search Keyword'
                                 onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                              <div class="input-group-append">
                                 <button class="btns" type="button"><i class="ti-search"></i></button>
                              </div>
                           </div>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Search</button>
                     </form>
                  </aside>
                  <aside class="single_sidebar_widget post_category_widget">
                     <h4 class="widget_title">Category</h4>
                     <ul class="list cat-list">
                        <li>
                           <a href="#" class="d-flex">
                              <p>Administrasi Kependudukan</p>
                              <p>(37)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Pelayanan Masyarakat</p>
                              <p>(10)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Kepegawaian</p>
                              <p>(03)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Infrastruktur</p>
                              <p>(11)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Kesehatan</p>
                              <p>(21)</p>
                           </a>
                        </li>
                        <li>
                           <a href="#" class="d-flex">
                              <p>Bantuan Kemanusiaan</p>
                              <p>(21)</p>
                           </a>
                        </li>
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Recent Post</h3>
                    <?php $count = 0; ?>

                      @foreach ($kanan as $baru)
                          <?php if($count == 4) break; ?>
                          @if($baru->status = "selesai")
                          <div class="media post_item">
                                <img src="{{asset('upload/'.$baru->foto)}}" width="50px" alt="post">
                                <div class="media-body">
                                   <a href="{{route('home.showing',$baru->id)}}">
                                      <h3>{{$baru->judul}}</h3>
                                   </a>
                                   <p>{{$baru->created_at->format('M d, Y')}}</p>
                                </div>
                             </div>
                             @elseif($baru->status = "proses")
                             <div class="media post_item">
                                <img src="{{asset('upload/'.$baru->foto)}}" width="50px" alt="post">
                                <div class="media-body">
                                   <a href="{{route('home.showing',$baru->id)}}">
                                      <h3>{{$baru->judul}}</h3>
                                   </a>
                                   <p>{{$baru->created_at->format('M d, Y')}}</p>
                                </div>
                             </div>
                             @endif
                          <?php $count++; ?>
                      @endforeach
                  </aside>
                  <aside class="single_sidebar_widget tag_cloud_widget">
                     <h4 class="widget_title">Tag Clouds</h4>
                     <ul class="list">
                        <li>
                           <a href="#">Infrastruktur</a>
                        </li>
                        <li>
                           <a href="#">Kepegawaian</a>
                        </li>
                        <li>
                           <a href="#">technology</a>
                        </li>
                        <li>
                           <a href="#">Kesehatan</a>
                        </li>
                        <li>
                           <a href="#">Kependudukan</a>
                        </li>
                        <li>
                           <a href="#">Kepegawaian</a>
                        </li>
                        <li>
                           <a href="#">Pelayanan Masyarakat</a>
                        </li>
                        <li>
                           <a href="#">Bantuan</a>
                        </li>
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget instagram_feeds">
                     <h4 class="widget_title">Popular Post</h4>
                     <ul class="instagram_row flex-wrap">
                      <?php $count = 0; ?>

                      @foreach ($kanan as $row)
                          <?php if($count == 6) break; ?>
                          @if($row->status == "selesai")
                           <li>
                               <a href="{{route('home.showing',$row->id)}}">
                                  <img class="img-fluid" src="{{asset('upload/'.$row->foto)}}" width="100px" height="100px" alt="">
                               </a>
                            </li>
                          @elseif($row->status == "proses")
                          <li>
                               <a href="{{route('home.showing',$row->id)}}">
                                  <img class="img-fluid" src="{{asset('upload/'.$row->foto)}}" width="100px" height="100px" alt="">
                               </a>
                            </li>
                          @endif
                          <?php $count++; ?>
                      @endforeach
                      
                     </ul>
                  </aside>
                <!--   <aside class="single_sidebar_widget newsletter_widget">
                     <h4 class="widget_title">Newsletter</h4>
                     <form action="#">
                        <div class="form-group">
                           <input type="email" class="form-control" onfocus="this.placeholder = ''"
                              onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Subscribe</button>
                     </form>
                  </aside> -->
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
@endsection