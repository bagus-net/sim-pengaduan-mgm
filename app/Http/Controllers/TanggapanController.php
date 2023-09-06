<?php

namespace App\Http\Controllers;

use App\Tanggapan;
use App\Pengaduan;
use Auth;
use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TanggapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {   
        $pengaduans = Pengaduan::latest()->paginate(20);
        return view('admin.pengaduan.index',compact('pengaduans'))
                ->with('i',(request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        return view('admin/pengaduan/show',compact('pengaduan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function edit(Tanggapan $tanggapan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
            Pengaduan::whereId($pengaduan->id)->update([
            'cover' => $request->cover,
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'status' => $request->status,
            'kategori' => $request->kategori,
            'id_petugas' =>$request->id_petugas,
            'foto' => $request->foto,
       ]);
        return redirect ('admin/pengaduan')->with('success','Data Has Been Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tanggapan  $tanggapan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pengaduan $pengaduan)
    {
        $pengaduan->delete();
        return back()
                ->with('destroy','1 Pengaduan Telah Di Hapus.');
    }
    public function showing($id){
        $pengaduan = \App\Pengaduan::find($id);
        return view('admin.pengaduan.show',compact('pengaduan'));  
    }
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        $pengaduans = DB::table('pengaduan')
        ->where('judul','like',"%".$cari."%")
        ->paginate();
 
            // mengirim data pegawai ke view index
        return view('admin.pengaduan.index',compact('pengaduans'));

 
    }
    
}
