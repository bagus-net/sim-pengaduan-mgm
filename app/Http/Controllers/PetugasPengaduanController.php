<?php

namespace App\Http\Controllers;

use App\Tanggapan;
use App\Tanggapans;
use App\Pengaduan;
use Auth;
use App\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasPengaduanController extends Controller
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
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        $pengaduans = Pengaduan::latest()->paginate(20);
        return view('petugas.pengaduan.index', compact('pengaduans', 'jmlh_belum'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function showing($id)
    {
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        $pengaduan = \App\Pengaduan::find($id);
        return view('petugas.pengaduan.show', compact('pengaduan', 'jmlh_belum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $pengaduan = \App\Pengaduans::find($id);
        $request->validate([
            'id' => 'required',
            'status' => 'required',
            'cover' => 'required',
            'nama_perusahaan' => 'required',
            'ketegori' => 'required',
            'foto' => 'required',
            'id_petugas' => 'required',
        ]);
        $pengaduan->update([
            'cover' => $request->input('cover'),
            'id' => $request->input('id'),
            'judul' => $request->input('judul'),
            'isi_laporan' => $request->input('isi_laporan'),
            'nama' => $request->input('nama'),
            'nama_perusahaan' => $request->input('nama_perusahaan'),
            'status' => $request->input('status'),
            'kategori' => $request->input('ketegori'),
            'id_petugas' => $request->input('id_petugas'),
            'foto' => $request->input('foto'),
        ]);
        // $pengaduan->update($request->all());
        return redirect('petugas/pengaduan')->with('success', 'Data Has Been Saved');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $pengaduan = \App\Pengaduan::find($id);
        $pengaduan->delete();
        return back()->with('destroy', 'Pengaduan Berhasil Di Hapus');
    }
}
