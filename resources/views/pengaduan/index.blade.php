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
                                <a href="{{url('login-user')}} class="btn header-btn">MASUK</a>
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
        </style>
        <div class="container">
            <!-- Section-tittle -->
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <div class="section-tittle text-center">
                        <span>Lapor</span>
                        <h2>Buat Laporan</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Slider Area End-->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                <div class="d-none d-sm-block mb-5 pb-4">
                   @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
    
                </div>
        
    
                <div class="row">
                    <div class="col-12">
                    </div>
                    <div class="col-lg-8 mx-auto card pt-50">
                        <div class="form-contact contact_form" id="contactForm">
                          <form  action="{{route('masyarakat-store')}}" enctype="multipart/form-data"  method="post">
                         {{ csrf_field() }}
                            {{ method_field('POST') }}
                            <div class="row">
                                <div class="col-12">
                                <div class="form-group">
                                    <input class="form-control" name="judul" autocomplete="off" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject" required>
                                   
                                </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                      <script src="assets/ckeditor/ckeditor.js"></script>

                                       <!--  <textarea class="form-control w-100" name="message" id="message" cols="30" rows="15" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder=" Enter Message"></textarea> -->
                                       <style>
                                          #cke_1_contents{
                                            height: 400px!important;
                                          }
                                        </style>

                                            <textarea name="isi_laporan" required="" id="editor1" rows="10" cols="80" >
                                                
                                            </textarea><br>
                                             <select name="kategori" id="" required="" data-placeholder="Category ..." class="standardSelect form-control col-md-12" tabindex="1" >
                                                <option value="" label="Category" disabled="true" selected="">Pilih Kategori ...&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
                                                <option value="Administrasi Kependudukan">Administrasi Kependudukan</option>
                                                <option value="Pelayanan Masyarakat">Pelayanan Masyarakat</option>
                                                <option value="Kepegawaian">Kepegawaian</option>
                                                <option value="Sembako">Infrastruktur</option>
                                                <option value="Kesehatan">Kesehatan</option>
                                                <option value="Bantuan Kemanusian">Bantuan Kemanusiaan</option>


                                            </select><br>
                                            <script>
                                                // Replace the <textarea id="editor1"> with a CKEditor
                                                // instance, using default configuration.
                                                CKEDITOR.replace( 'isi_laporan' );
                                            </script>
                                                <br>    
                                    </div>
                                </div>
                              <div class="accordion col-md-12" id="accordionExample">
                              <div class="card">
                                <div class="card-header" id="headingOne">
                                  <h2 class="mb-0">
                                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                      Lampiran
                                    </button>
                                  </h2>
                                </div>
                                <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                  <div class="card-body">
                                   <div class="row">
                                       <div class="col-lg-6">
                                           <input type="file" name="foto" required="" id="profile-img"  class="form-control"><br>
                                           <input type="text" name="status" value="verified" hidden="">
                                           <input type="text" name="nama_perusahaan" hidden="" value="{{auth()->user()->nama_perusahaan}}">
                                           <input type="text" name="nama" hidden="" value="{{auth()->user()->name}}">
                                           <input type="text" name="cover" hidden="" value="{{auth()->user()->foto}}">

                                          

                                       </div>
                                       <div class="col-lg-6 ">
                                           <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcQoAiieUwg5-P1GXsZbSBHpGl9WOzMq_-E4IEh_u8cPh00b2e-N" id="profile-img-tag" class="float-right" alt="" width="200px">
                                       </div>
                                   </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
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
@endsection