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
    <div class="services-area">
        <style>
            .services-area{
                padding-top: 130px;
            }
            .blog_area{
              padding-top: 2%; 
            }
            .blog_right_sidebar{
              margin-top: -7.5%;
            }
            .posts-list{
              margin-top: -6.5%
            }
        </style>
    </div>
     <!-- Slider Area End-->
     
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="blog-author">
                @if($message = Session::get('destroy'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                  <strong>Success!</strong> {{$message}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                @elseif($message = Session::get('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                  <strong>Success!</strong> {{$message}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                @elseif($message = Session::get('warning'))
                                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                  <strong>Success!</strong> {{$message}}
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                              @endif
                  <h4 style="margin-top: 2%">Laporan Saya</h4><br><br>
                 

                 @foreach($laporansaya as $laporan)
{{--                  @if($laporan->id->first == null)
                  <h4 class="text-center" style="margin-bottom: 10%">BELUM ADA LAPORAN</h4>
                 @endif --}}
                 @if( auth()->user()->nik == $laporan->nik )
                 @if($laporan->status == "verified")
                  <div class="media align-items-top" style="margin-bottom: 10%">
                     <img src="{{asset('upload/'.$laporan->cover)}}" alt="">
                     <div class="media-body">
                        <a href="{{route('home.showing',$laporan->id)}}">
                           <h4>{{$laporan->judul}}</h4>
                        </a>
                          <p style="font-size: 13px;margin-top: -1%;"> 
                            <span class="align-middle"><i class="fa fa-info-circle"></i></span><span> &nbsp;Belum Terverifikasi</span>
                            <span style="margin-left:30px" class="border rounded">&nbsp;&nbsp;&nbsp;Harus diverifikasi dalam 3 hari&nbsp;&nbsp;&nbsp;</span></p>

                        <p>{!!  Illuminate\Support\Str::limit($laporan->isi_laporan, 200)!!}  </p>
                        <br> <img style="border-radius: 0;" class="img-fluid" src="{{asset('upload/'.$laporan->foto)}}" alt="">
                     </div>
                  </div>

                 @elseif($laporan->status == "proses")
            <div class="media align-items-top" style="margin-bottom: 10%">
                     <img src="{{asset('upload/'.$laporan->cover)}}" alt="">
                     <div class="media-body">
                        <a href="{{route('home.showing',$laporan->id)}}">
                           <h4>{{$laporan->judul}}</h4>
                        </a>
                          <p style="font-size: 13px;margin-top: -1%;"> 
                            <span class="align-middle font-weight-bold text-danger"><i class="fa fa-sync rounded rounded-circle"></i></span><span class="text-danger"> &nbsp;Proses</span>
                        <p>{!!  Illuminate\Support\Str::limit($laporan->isi_laporan, 200)!!}  </p>
                        <br> <img style="border-radius: 0;" class="img-fluid" src="{{asset('upload/'.$laporan->foto)}}" alt="">
                     </div>
                  </div>
                 @elseif($laporan->status == "selesai")
                   <div class="media align-items-top" style="margin-bottom: 10%">
                     <img src="{{asset('upload/'.$laporan->cover)}}" alt="">
                     <div class="media-body">
                        <a href="{{route('home.showing',$laporan->id)}}">
                           <h4>{{$laporan->judul}}</h4>
                        </a>
                          <p style="font-size: 13px;margin-top: -1%;"> 
                            <span class="align-middle font-weight-bold text-primary"><i class="fa fa-check-circle"></i></span><span> &nbsp;Selesai</span>
                        <p>{!!  Illuminate\Support\Str::limit($laporan->isi_laporan, 200)!!} </p>
                       <br> <img style="border-radius: 0;" class="img-fluid" src="{{asset('upload/'.$laporan->foto)}}" alt="">
                     </div>
                  </div>
                  
                 

                @endif 
                @endif
                 @endforeach
                {!! $laporansaya->links() !!}


               

               </div>
               <div class="comments-area" id="coment">
                  <h4>Semua Laporan</h4>
                  @foreach($pengaduans as $pengaduan)
                  @if($pengaduan->status == "proses")
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="{{asset('upload/'.$pengaduan->cover)}}" alt="">
                           </div>
                           <div class="desc">
                            <h5>{{$pengaduan->judul}} &nbsp;&nbsp;<i class="fa fa-check-circle text-danger" style="font-size: 15px">&nbsp;Proses</i></h5>
                              <p class="comment pt-2" >
                                 {!!  Illuminate\Support\Str::limit($pengaduan->isi_laporan, 200)!!} 
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">{{$pengaduan->nama}}</a>
                                    </h5>
                                    <p class="date">{{$pengaduan->created_at->format('M d, Y')}} at {{$pengaduan->created_at->format('H:i')}}</p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="{{route('home.showing',$pengaduan->id)}}" class="btn-reply text-uppercase">show</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @elseif($pengaduan->status == "selesai")
                  <div class="comment-list">
                     <div class="single-comment justify-content-between d-flex">
                        <div class="user justify-content-between d-flex">
                           <div class="thumb">
                              <img src="{{asset('upload/'.$pengaduan->cover)}}" alt="">
                           </div>
                           <div class="desc">
                            <h5>{{$pengaduan->judul}} &nbsp;&nbsp;<i class="fa fa-check-circle text-primary" style="font-size: 15px">&nbsp;Selesai</i></h5>
                              <p class="comment pt-2" >
                                 {!!  Illuminate\Support\Str::limit($pengaduan->isi_laporan, 200)!!} 
                              </p>
                              <div class="d-flex justify-content-between">
                                 <div class="d-flex align-items-center">
                                    <h5>
                                       <a href="#">{{$pengaduan->nama}}</a>
                                    </h5>
                                    <p class="date">{{$pengaduan->created_at->format('M d, Y')}} at {{$pengaduan->created_at->format('H:i')}}</p>
                                 </div>
                                 <div class="reply-btn">
                                    <a href="{{route('home.showing',$pengaduan->id)}}" class="btn-reply text-uppercase">show</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  @endforeach
                  {{ $pengaduans->links() }}
               </div>
            </div>
            <div class="col-lg-4">
               <div class="blog_right_sidebar">
                  <aside class="single_sidebar_widget search_widget">
                     <!-- PROFILE -->
                    <div class="card">
                      <div class="card-header" style="background-color: #ffff;border:none;background-image: url('https://image.freepik.com/free-vector/abstract-futuristic-background_23-2148392654.jpg');height:100px  ;">
                        
                      </div>
                      <div class="card-body container" style="margin-top: -20%;">
                      <div class="media">
                        <a href="{{url('profile')}}">
                          <img  src="{{asset('upload/'. auth()->user()->foto)}}"  class="align-self-center mr-3 rounded-circle" width="70px" alt="...">
                        </a>
                        <div class="media-body">
                          <p class="font-weight-bold text-white aver" style="margin-top: 5%;font-size: 17px">{{auth()->user()->name}}</p>
                          <p style="font-size: 14px;margin-top: -8%" class="text-capitalize">{{auth()->user()->level}}</p>
                        </div>
                      </div>
                      <div class="row mx-auto text-center pt-2">
                        <div class="col-md-6">
                          <p class="" style="font-size: 13px">Proses</p>
                          <p class="font-weight-bold" style="font-size: 22px;margin-top: -10%">
                           @foreach($counting as $id)
                           @if($id->nama_perusahaan == auth()->user()->nama_perusahaan)
                           @if($id->status == "proses")
                           {{$id->select('pengaduan')->where('nama_perusahaan', auth()->user()->nama_perusahaan)->where('status', "proses")->count()}}
                           @break
                           @endif
                           @endif
                           @endforeach
                          </p>
                        </div>
                        <div class="col-md-6">
                          <p class="" style="font-size: 13px">Selesai</p>
                          <p class="font-weight-bold" style="font-size: 22px;margin-top: -10%">
                          @foreach($counting as $id)
                           @if($id->nama_perusahaan == auth()->user()->nama_perusahaan)
                           @if($id->status == "selesai")
                           {{$id->select('pengaduan')->where('nama_perusahaan', auth()->user()->nama_perusahaan)->where('status', "selesai")->count()}}
                           @break
                           @endif
                           @endif
                           @endforeach
                          </p>
                        </div>
                      </div>
                    </div>
                    </div>
  
                  </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
                     @foreach($pengumuman as $row)
                     <h5 class="widget_title">Pengumuman</h5>
                     <ul class="list">
                      <p style="font-weight: bold;font-size: 18px">{{$row->judul}}</p>
                      <p class="text-justify">{!!$row->isi!!}</p>
                     </ul>
                     @endforeach
                  </aside>
                  <aside class="single_sidebar_widget instagram_feeds">
                     <h4 class="widget_title">Popular</h4>
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

@endsection
