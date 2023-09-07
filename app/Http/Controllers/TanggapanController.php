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
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        $pengaduans = Pengaduan::latest()->paginate(20);
        return view('admin.pengaduan.index', compact('pengaduans', 'jmlh_belum'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
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
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        return view('admin/pengaduan/show', compact('pengaduan', 'jmlh_belum'));
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
            'nama_perusahaan' => $request->nama_perusahaan,
            'status' => $request->status,
            'kategori' => $request->kategori,
            'id_petugas' => $request->id_petugas,
            'foto' => $request->foto,
        ]);
        return redirect('admin/pengaduan')->with('success', 'Data Has Been Saved');
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
            ->with('destroy', '1 Pengaduan Telah Di Hapus.');
    }
    public function showing($id)
    {
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        $pengaduan = \App\Pengaduan::find($id);
        return view('admin.pengaduan.show', compact('pengaduan', 'jmlh_belum'));
    }
    public function cari(Request $request)
    {
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        // menangkap data pencarian
        $cari = $request->cari;

        $pengaduans = DB::table('pengaduan')
            ->where('judul', 'like', "%" . $cari . "%")
            ->paginate();

        // mengirim data pegawai ke view index
        return view('admin.pengaduan.index', compact('pengaduans', 'jml_belum'));
    }
}
