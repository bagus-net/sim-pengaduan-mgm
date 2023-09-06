@extends('admin.layouts.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
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

                    <li class="menu-item-has-children dropdown active">
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
                    <li class="menu-item-has-children dropdown">
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
                                    <li><a href="#">Pengaduan</a></li>
                                    <li class="active">Tampilkan</li>
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
                            <div class="card-header">
                                <strong class="card-title">Semua Pengaduan</strong>
                                <form action="{{route('cari-pengaduan')}}" method="GET">
                                {{-- <button type="submit"  class="btn btn-sm btn-primary float-right"><i class="fa fa-search"></i></button> --}}
                               <input type="text" name="cari" id="myInput"  placeholder="Search .." autocomplete="off" class="form-control col-md-2 form-control-sm  float-right">
                               </form>

                            </div>
                            <div class="table-stats order-table ov-h">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th class="serial">#</th>
                                            <th width="501px">Title</th>
                                            <th class="text-center">Created At</th>
                                            <th class="text-center">Action</th>
                                            <th class="text-center">Status</th>

                                        </tr>
                                    </thead>
                                     
                                    <tbody id="myTable">
                                        @foreach($pengaduans as $pengaduan)
                                        @if($pengaduan->status == "verified")
                                        <tr>
                                            <td class="serial">{{++$i}}</td>
                                            <td>  <span class="name">{{$pengaduan->judul}}</span> </td>
                                            <td class="text-center"> <span class="">{{$pengaduan->created_at->format('d M')}}</span> </td>
                                            <td class="text-center"><span >
                                            <form action="{{route('pengaduan.destroy',$pengaduan->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger fa fa-times" onclick="return confirm('Are you sure?')"></button>
                                                <a href="{{route('tanggapan.showing',$pengaduan->id)}}" class="btn fa fa-eye"></a>
                                                <a href="{{route('tanggapan.showing',$pengaduan->id)}}"  class="btn btn-success fa fa-check-square-o"></a>
                                            </form>
                                            </span></td>
                                            <td class="text-center">
                                                <span class="badge badge-primary">Verified</span>

                                            </td>
                                        </tr>
                                        @elseif($pengaduan->status == "proses")
                                        <tr>
                                            <td class="serial">{{++$i}}</td>
                                            <td>  <span class="name">{{$pengaduan->judul}}</span> </td>
                                            <td class="text-center"> <span class="">{{$pengaduan->created_at->format('d M')}}</span> </td>
                                            <td class="text-center"><span >
                                            <form action="{{route('pengaduan.destroy',$pengaduan->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger fa fa-times" onclick="return confirm('Are you sure?')"></button>
                                                <a href="{{route('tanggapan.showing',$pengaduan->id)}}" class="btn fa fa-eye"></a>
                                                <a href="{{route('tanggapan.showing',$pengaduan->id)}}"  class="btn btn-success fa fa-check-square-o"></a>
                                            </form>
                                            </span></td>
                                            <td class="text-center">
                                                <span class="badge badge-danger">Proses</span>

                                            </td>
                                        </tr>
                                        @elseif($pengaduan->status == "selesai")
                                        <tr>
                                            <td class="serial">{{++$i}}</td>
                                            <td>  <span class="name">{{$pengaduan->judul}}</span> </td>
                                            <td class="text-center"> <span class="">{{$pengaduan->created_at->format('d M')}}</span> </td>
                                            <td class="text-center"><span >
                                            <form action="{{route('pengaduan.destroy',$pengaduan->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger fa fa-times" onclick="return confirm('Are you sure?')"></button>
                                                 <a href="{{route('tanggapan.showing',$pengaduan->id)}}" class="btn fa fa-eye"></a>
                                                <a href="{{route('tanggapan.showing',$pengaduan->id)}}"  class="btn btn-success fa fa-check-square-o"></a>
                                            </form>
                                            </span></td>
                                            <td class="text-center">
                                                <span class="badge badge-success">Selesai</span>

                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                       
                                          
                                        
                                    </tbody>
                                   
                                </table>
                                   <div class="card-body row">
                                    <p class="col-md-6"> Jumlah Data : {{ $pengaduans->total() }}  </p>
                                    {{ $pengaduans->links() }}
                                   </div>
                            </div> <!-- /.table-stats -->
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