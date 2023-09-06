<?php

namespace App\Http\Controllers;
use App\Pengaduan;
use App\User;
use App\Komentar;
use App\Pengumuman;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $laporansaya = Pengaduan::latest()->paginate(5);
        $pengumuman = Pengumuman::latest()->paginate(1);
        $pengaduans = Pengaduan::latest()->paginate(7);
        $counting = Pengaduan::all();
        $kanan = \App\Pengaduan::all();
        return view('home.home',compact('laporansaya','pengaduans','counting','kanan','pengumuman'))
         ->with('i',(request()->input('page', 1) -1) *5);

    }
      public function showing($id){
        $kanan = \App\Pengaduan::all();
        $pengaduan = \App\Pengaduan::find($id);
        $komentar = Komentar::all();
        return view('home.show',compact('pengaduan','komentar','kanan'));  
    }
    public function komentar(Request $request)
    {
       Komentar::create([
            'name' => $request->name,
            'komentar' => $request->komentar,
            'foto' => $request->foto,
            'id_pengaduan' => $request->id_pengaduan,
       ]);
       return back()->with('success','komentar berhasil dikirim');
    }
}
