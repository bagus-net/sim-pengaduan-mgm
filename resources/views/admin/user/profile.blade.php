@extends('admin.layouts.app')
@section('content')

<body>
    <!-- Left Panel -->
     <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-title">DASHBOARD</li><!-- /.menu-title -->
                    <li class="">
                        <a href="{{url('admin/dashboard')}}"><i class="menu-icon fa fa-laptop"></i>Dashboard</a>
                    </li>
                    <li class="menu-title">KELOLA DATA</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-envelope"></i>Pengumuman</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-tags"></i><a href="{{url('admin/pengumuman')}}">Tampilkan</a></li>
                            <li><i class="fa fa-pencil-square-o"></i><a href="{{url('admin/pengumuman/create')}}">Buat Pengumuman</a></li>
                        </ul>
                    </li>

                    <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-table"></i>Pengaduan</a>
                        <ul class="sub-menu children dropdown-menu ">
                            <li><i class="fa fa-table "></i><a href="{{url('admin/pengaduan')}}">Tampilkan</a></li>
                            

                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-comments-o"></i>Komentar</a>
                        <ul class="sub-menu children dropdown-menu ">
                            <li><i class="fa fa-table "></i><a href="{{url('admin/komentar')}}">Tampilkan</a></li>

                        </ul>
                    </li>
                    <li class="menu-title">User</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown active">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-user"></i>Admin</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-users"></i><a href="{{url('admin/user')}}">Semua User</a></li>
                            <li><i class="menu-icon fa fa-unlock-alt"></i><a href="{{route('user.showing',auth()->user()->id)}}">Edit Profile</a></li>
                        </ul>
                    </li>
                     <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-users"></i>Masyarakat</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-share"></i><a href="{{url('admin/masyarakat')}}">Semua Masyarakat</a></li>
                        </ul>
                    </li>
                    <li class="menu-title">Laporan</li><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-paste"></i>Laporan</a>
                        <ul class="sub-menu children dropdown-menu">                            
                            <li><i class="fa fa-rotate-right"></i><a href="{{url('admin/laporan')}}">Buat Laporan</a></li>
                        </ul>
                    </li>

                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('admin/dashboard')}}"><img src="{{asset('admin/images/logo.png')}}" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="{{url('admin/dashboard')}}"><img src="{{asset('admin/images/logo2.png')}}" alt="Logo"></a>
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

                            <a class="nav-link" href="{{url('admin/pengaduan')}}"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="{{route('user.showing',auth()->user()->id)}}"><i class="fa fa -cog"></i>Settings</a>

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
                                    <li><a href="#">User</a></li>
                                    <li class="active">Edit Profile</li>
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
                            <div class="col-md-6 offset-3"><br>
                                <div class="card">
                                    <div class="card-header">
                                        <i class="fa fa-user"></i><strong class="card-title pl-2">Profile Card</strong>
                                    </div>
                                    <div class="card-body">
                                        <form class="form-horizontal" action="{{ route('user.update', $user->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                        @method('PUT')

                                        <div class="mx-auto d-block">
                                            <img class="rounded-circle mx-auto d-block" id="profile-img-tag" width="80px" height="80px" src="{{asset('upload/'. $user->foto)}}" alt="Harus Persegi">
                                           <div class="mx-auto text-center">
                                                <label for="profile-img" class="mx-auto d-block"><i class="btn fa fa-camera"></i></label>
                                           </div>
                                           <input type="file" name="foto" id="profile-img"  hidden="">
                                            <h5 class="text-sm-center mt-2 mb-1 font-weight-bold">{{$user->name}}</h5>
                                            <h5 class="text-sm-center mt-2 mb-1">{{$user->email}}</h5>
                                        </div>
                                        <hr>
                                        <div class="card-text text-sm-center">
                                            <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                            <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                            <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                            <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                                        </div>
                                    </div>
                                </div>
                                 <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" name="name" autocomplete="off" value="{{$user->name}}" class="form-control">
                                    </div>
                                     <div class="form-group">
                                        <label for="">Email</label>
                                         <input type="text" class="form-control" name="email" value="{{$user->email}}" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" value="{{$user->password}}" disabled="">
                                    <input type="hidden" name="fotoLama" value="{{$user->foto}}">

                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure?')">UPDATE</button>
                                    </div>
                                    </div>
                                </div>
                                </form>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

<div class="clearfix"></div>
</div><!-- /#right-panel -->
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
