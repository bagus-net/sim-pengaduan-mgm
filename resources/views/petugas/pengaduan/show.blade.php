@extends('petugas.layouts.app')
@section('content')

<body>
    <!-- Left Panel -->
     <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">DASHBOARD</li><!-- /.menu-title -->
                    <li class="">
                        <a href="{{url('petugas/dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                    </li>
                    <li class="menu-title">KELOLA DATA</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope"></i>Pengumuman</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-tags"></i><a href="{{url('petugas/pengumuman')}}">Tampilkan</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown active ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Pengaduan</a>
                        <ul class="sub-menu children dropdown-menu ">
                            <li><i class="fa fa-table "></i><a href="{{url('petugas/pengaduan')}}">Tampilkan</a></li>
                            

                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comments-o"></i>Komentar</a>
                        <ul class="sub-menu children dropdown-menu ">
                            <li><i class="fa fa-table "></i><a href="{{url('petugas/komentar')}}">Tampilkan</a></li>

                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('petugas/dashboard')}}"><img src="{{asset('admin/images/logo.png')}}" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="./"><img src="{{asset('admin/images/logo2.png')}}" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">


                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{asset('upload/'.auth()->user()->foto)}}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="{{route('user.show',auth()->user()->id)}}"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="{{url('petugas/pengaduan')}}"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="{{route('petugas-user.showing',auth()->user()->id)}}"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                    <i class="fa "></i>
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li><a href="#">Pengaduan</a></li>
                                    <li class="active">Detail</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
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
                            <div class="card-header">
                                <strong class="card-title">{{$pengaduan->judul}}</strong><br>
                                <span style="font-size: 12.5px;color: #434343">Kategori : {{$pengaduan->kategori}}</span>
                                @if($pengaduan->status == "verified")
                                <label for="euyy"  style="font-size: 12px;padding: 0.7%;margin-top: -1%;"  class="float-right font-weight-bold btn btn-primary btn-sm col-md-1 ">PROSES</label>
                                @elseif($pengaduan->status == "proses")
                                <label for="euyy"  style="font-size: 12px;padding: 0.7%;margin-top: -1%;"  class="float-right font-weight-bold btn btn-success btn-sm col-md-1 ">SELESAI</label>
                                @endif

                            </div>
                            <form action="{{route('pengaduan-petugas.update',$pengaduan->id)}}"  method="post" enctype="multipart/form-data" >
                            @csrf
                            {{ method_field('POST') }}
                            <input type="text" name="ketegori" value="{{$pengaduan->kategori}}" hidden="">
                            <div class="media card-body">
                               <div class="media-body text-justify" style="margin-right: 1%;"> 
                               {!!$pengaduan->isi_laporan!!}
                            </div>
                                  <img src="{{asset('upload/'.$pengaduan->foto)}}" class="align-self-center  mr-3" width="200px" alt="...">

                            </div>
                            <div class="card-footer">
                                <a href="{{url('petugas/pengaduan')}}" class="btn fa fa-arrow-left float-left"></a>
                                <strong class="float-right">{{$pengaduan->nama}}</strong><br>
                                <strong class="float-right" style="font-size: 14px">{{$pengaduan->created_at->format('d M Y')}}</strong>

                            </div>
                            <input type="text" name="isi_laporan" value="{!!$pengaduan->isi_laporan!!}" hidden="">
                            <input type="text" name="id_petugas" value="{{auth()->user()->id}}" hidden="">
                            <input type="text" name="judul" value="{{$pengaduan->judul}}" hidden="">
                            @if($pengaduan->status == "verified")
                            <input type="text" name="status" value="proses" hidden="">
                            @elseif($pengaduan->status == "proses")
                            <input type="text" name="status" value="selesai" hidden="">
                            @endif
                            <input type="text" name="nik" hidden="" value="{{$pengaduan->nik}}">
                            <input type="text" name="id" hidden="" value="{{$pengaduan->id}}">
                            <input type="text" name="nama" hidden="" value="{{$pengaduan->nama}}">
                            <input type="text" name="cover" hidden="" value="{{$pengaduan->cover}}">
                            <input type="text" name="foto" hidden="" value="{{ $pengaduan->foto }}">
                            <button type="submit" id="euyy" onclick="return confirm('Laporan Akan Di Proses?')" hidden="">  PROSES  </button><br>           
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
</div><!-- /#right-panel -->
@endsection