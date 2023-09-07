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
                padding-top: 160px;
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
            .hover:hover{
              cursor: pointer;
            }
        </style>
    </div>
     <!-- Slider Area End-->
     
   <!--================Blog Area =================-->
    <div class="col-md-11  container">
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
          </div>
   <section class="blog_area single-post-area section-padding">
      <div class="container">
         <div class="row">
         
            <div class="col-lg-8 posts-list">
               <div class="blog-author ">
                  <h4 style="margin-top: 2%">Informasi Saya</h4><br><br>
                  <form action="{{ route('profile.update', auth()->user()->id) }}" method="post" enctype="multipart/form-data">
                   @csrf
                   @method('PUT')
                 <div class="row">

                    <div class="col-md-2 mx-auto" >
                    
                      <label for="profile-img">
                    <img src="https://img.icons8.com/carbon-copy/2x/camera.png" class="hover rounded-circle " id="profile-img-tag"  alt="">
                    <span><p class="" style="font-size: 12px;margin-left: -10px;margin-top: -5px">*ubah foto profile</p></span>
                      </label>
                    <input type="file" name="foto" class="form-control form-control-sm" hidden="" id="profile-img">
                    <!-- <a href=""><i class="genric-btn primary small fa fa-camera"></i></a> -->
                  </div>

                  <div class="col-md-9">
                     <div class="form-group">
                      <label for="" style="font-size: 14px">Nama Perusahaan</label>
                      <input type="text" placeholder="nama perusahaan" disabled="" name="" value="{{auth()->user()->nama_perusahaan}}" class="form-control col-md-8 bg-white">
                    </div>
                     <input type="text" placeholder="nama perusahaan"  name="nama_perusahaane"  value="{{auth()->user()->nama_perusahaan}}" hidden="" class="form-control col-md-8 bg-white">
                    <div class="form-group">
                      <label for="" style="font-size: 14px">Nama</label>
                      <input type="text" placeholder="nama" name="name" autocomplete="off" value="{{auth()->user()->name}}" class="form-control ">
                    </div>
                    <div class="form-group">
                      <label for="" style="font-size: 14px">Email</label>
                      <input type="text" placeholder="email" name="email" value="{{auth()->user()->email}}" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="" style="font-size: 14px">Password</label>
                      <input type="password" placeholder="password" name="password" value="{{auth()->user()->password}}" disabled="" class="form-control">
                    </div>
                    <div class="form-group">
                      <label for="" style="font-size: 14px">No Telp</label>
                      <input type="number" placeholder="telp" name="telp" value="{{auth()->user()->telp}}" class="form-control col-md-8">
                    </div>
                    <input type="hidden" name="fotoLama" value="{{ auth()->user()->foto }}">
                    <button type="submit" class="genric-btn info radius" onclick="return myFunctionConfirm()">ubah</button>

                  </div>
                  
                 </div>
                 </form>
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
                        <a href="#profile">
                          <img src="{{asset('upload/'.auth()->user()->foto)}}" class="align-self-center mr-3 rounded-circle" width="70px" alt="...">
                        </a>
                        <div class="media-body">
                          <p class="font-weight-bold text-white aver" style="margin-top: 5%;font-size: 17px">{{auth()->user()->name}}</p>
                          <p style="font-size: 14px;margin-top: -8%">{{auth()->user()->level}}</p>
                        </div>
                      </div>
                      <div class="row mx-auto text-center pt-2">
                       <div class="col-md-6">
                          <p class="" style="font-size: 13px">Proses</p>
                          <p class="font-weight-bold" style="font-size: 22px;margin-top: -10%">
                          @foreach($laporansaya as $id)
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
                          @foreach($laporansaya as $id)
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
                        
            <div class="col-md-12">
                <div class="blog-author">
                  <h4 style="margin-top: 2%">Laporan Saya</h4><br><br>
                @foreach($pengaduans as $pengaduan)
                 @if( auth()->user()->nama_perusahaan == $pengaduan->nama_perusahaan )
                 @if($pengaduan->status == "verified")
                  <div class="media align-items-top" style="margin-bottom: 4%">
                     <img src="{{asset('upload/'.$pengaduan->cover)}}" alt="">
                     
                     <div class="media-body">
                        <a href="{{route('home.showing',$pengaduan->id)}}">
                           <h4>{{$pengaduan->judul}}</h4>
                        </a>
                          <p style="font-size: 13px;margin-top: 0%;"> 
                            <span class="align-middle"><i class="fa fa-info-circle"></i></span><span> &nbsp;Belum Terverifikasi</span>
                            <span style="margin-left:30px" class="border rounded">&nbsp;&nbsp;&nbsp;Harus diverifikasi dalam 3 hari&nbsp;&nbsp;&nbsp;</span></p>

                        {!!Str::limit($pengaduan->isi_laporan, 300 )!!}
                        <br> <img style="border-radius: 0;" class="img-fluid" src="{{asset('upload/'.$pengaduan->foto)}}" alt="">
                        <br>
                        <form action="{{route('masyarakat-destroy',$pengaduan->id)}}" method="POST">
                          @csrf
                          @method('POST')
                        <a href="{{route('masyarakat-pengaduan.showing',$pengaduan->id)}}" class="text-primary" style="font-size: 13px"><i class="fa fa-edit"></i>&nbsp;&nbsp;edit laporan</a> &nbsp;|&nbsp;
                        <label for="hapus"  class="text-danger hover" style="font-size: 13px"><i class="fa fa-trash"></i>&nbsp;&nbsp;hapus laporan</label>
                        <button type="submit" class="btn btn-danger fa fa-times" onclick="return confirm('Apakah Anda Yakin?')" hidden="" id="hapus"></button>
                        </form>
                     </div>
                  </div>
                 @elseif($pengaduan->status == "proses")
            <div class="media align-items-top" style="margin-bottom: 4%">
                     <img src="{{asset('upload/'.$pengaduan->cover)}}" alt="">
                     <div class="media-body">
                        <a href="{{route('home.showing',$pengaduan->id)}}">
                           <h4>{{$pengaduan->judul}}</h4>
                        </a>
                          <p style="font-size: 13px;margin-top: 0%;"> 
                            <span class="align-middle font-weight-bold text-danger"><i class="fa fa-sync rounded rounded-circle"></i></span><span class="text-danger"> &nbsp;Proses</span>
                        {!!Str::limit($pengaduan->isi_laporan, 300 )!!}
                        <br> <img style="border-radius: 0;" class="img-fluid" src="{{asset('upload/'.$pengaduan->foto)}}" alt="">
                        <br>
                        <form action="{{route('masyarakat-destroy',$pengaduan->id)}}" method="POST">
                          @csrf
                          @method('POST')
                        <label for="hapus"  class="text-danger hover" style="font-size: 13px"><i class="fa fa-trash"></i>&nbsp;&nbsp;hapus laporan</label>
                        <button type="submit" class="btn btn-danger fa fa-times" onclick="return confirm('Apakah Anda Yakin?')" hidden="" id="hapus"></button>
                        </form>
                     </div>
                  </div>
                 @elseif($pengaduan->status == "selesai")
                   <div class="media align-items-top" style="margin-bottom: 4%">
                     <img src="{{asset('upload/'.$pengaduan->cover)}}" alt="">
                     <div class="media-body">
                        <a href="{{route('home.showing',$pengaduan->id)}}">
                           <h4>{{$pengaduan->judul}}</h4>
                        </a>
                          <p style="font-size: 13px;margin-top: 0%;"> 
                            <span class="align-middle font-weight-bold text-primary"><i class="fa fa-check-circle"></i></span><span> &nbsp;Selesai</span>
                        {!!Str::limit($pengaduan->isi_laporan, 300 )!!} 
                       <br> <img style="border-radius: 0;" class="img-fluid" src="{{asset('upload/'.$pengaduan->foto)}}" alt="">
                       <br>
                        <form action="{{route('masyarakat-destroy',$pengaduan->id)}}" method="POST">
                          @csrf
                          @method('POST')
                        <label for="hapus"  class="text-danger hover" style="font-size: 13px"><i class="fa fa-trash"></i>&nbsp;&nbsp;hapus laporan</label>
                        <button type="submit" class="btn btn-danger fa fa-times" onclick="return confirm('Apakah Anda Yakin?')" hidden="" id="hapus"></button>
                        </form>
                     </div>
                  </div>
                  @else
                  <h4 class="text-center" style="margin-bottom: 10%">BELUM ADA LAPORAN</h4>

                @endif 
                @endif
                 @endforeach
            {{ $pengaduans->links() }}

                  <!-- <h4 class="text-center" style="margin-bottom: 10%">BELUM ADA LAPORAN</h4> -->
               </div>
            </div>
         </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->

        
		<!-- Jquery Plugins, main Jquery -->	
        <script src="./assets/js/plugins.js"></script>
                  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#profile-img").change(function(){
        readURL(this);
    });

</script>
<script type="text/javascript">

function myFunctionConfirm() {
    return confirm('Ubah Profile?')
}

</script>
        <script src="./assets/js/main.js"></script>
        

@endsection