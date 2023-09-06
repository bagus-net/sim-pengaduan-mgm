<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
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
        $pengumumans = Pengumuman::latest()->paginate(20);
        return view('admin.pengumuman.index', compact('pengumumans', 'jmlh_belum'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        return view('admin.pengumuman.create', compact('jmlh_belum'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Pengumuman::create([
            'nama' => $request->nama,
            'level' => $request->level,
            'isi' => $request->isi,
            'judul' => $request->judul,
        ]);
        return redirect('admin/pengumuman')->with('success', 'pengumuman berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function showing($id)
    {
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        $pengumuman = \App\Pengumuman::find($id);
        return view('admin.pengumuman.show', compact('pengumuman', 'jmlh_belum'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        return view('admin.pengumuman.edit', compact('pengumuman', 'jmlh_belum'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        Pengumuman::whereId($pengumuman->id)->update([
            'nama' => $request->nama,
            'judul' => $request->judul,
            'isi' => $request->isi,
            'level' => $request->level,
        ]);
        return redirect('admin/pengumuman')->with('warning', 'Data Telah di ubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();
        return back()
            ->with('destroy', '1 Pengumuman Telah Di Hapus.');
    }
}
