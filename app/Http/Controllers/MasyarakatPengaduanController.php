<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Pengaduans;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MasyarakatPengaduanController extends Controller
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
    return view('pengaduan.index');
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
        $request->validate([
            'cover'    =>  'required',
            'nik'     =>  'required',
            'foto'         =>  'required|image|max:2048'
        ]);

        $foto = $request->file('foto');
        $namaFile = Carbon::now()->timestamp . '_' . '.' . $foto->getClientOriginalExtension();
        $foto->move(public_path('upload/'),$namaFile);
        Pengaduan::create([
            'cover' => $request->cover,
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'status' => $request->status,
            'kategori' => $request->kategori,
            'foto' => $namaFile
       ]);
       return redirect ('home')->with('success','Data Has Been Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function show(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        return view('pengaduan.edit',compact('pengaduan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id){
        $pengaduan = \App\Pengaduans::find($id);
        $fotoLama = $request->fotoLama;
        $foto = $request->file('foto');
        if(!empty($foto)){
           $foto = $request->file('foto');
           $namaFile = Carbon::now()->timestamp . '_' . '.' . $foto->getClientOriginalExtension();
           $foto->move(public_path('upload/'),$namaFile);
        }else {
            $foto = $fotoLama;
            $namaFile = $foto;

        }
            $pengaduan->update([
            'cover' => $request->cover,
            'judul' => $request->judul,
            'isi_laporan' => $request->isi_laporan,
            'nama' => $request->nama,
            'nik' => $request->nik,
            'status' => $request->status,
            'kategori' => $request->kategori,
            'foto' => $namaFile
       ]);
        return redirect ('profile')->with('success','Data Has Been Saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */

     public function delete ($id){
        $pengaduan = \App\Pengaduans::find($id);
        $pengaduan->delete();
        return back()->with('danger','Data Berhasil Di Hapus');
    }
    public function showing($id){
        $pengaduan = \App\Pengaduan::find($id);
        return view('pengaduan.edit',compact('pengaduan'));  
    }
}
