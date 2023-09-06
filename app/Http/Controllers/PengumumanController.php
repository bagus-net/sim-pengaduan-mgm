<?php

namespace App\Http\Controllers;

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
        $pengumumans = Pengumuman::latest()->paginate(20);
        return view('admin.pengumuman.index',compact('pengumumans'))
                ->with('i',(request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pengumuman.create');
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
       return redirect('admin/pengumuman')->with('success','pengumuman berhasil dikirim');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function showing($id){
        $pengumuman = \App\Pengumuman::find($id);
        return view('admin.pengumuman.show',compact('pengumuman'));  
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pengumuman  $pengumuman
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('admin.pengumuman.edit',compact('pengumuman'));
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
        return redirect ('admin/pengumuman')->with('warning','Data Telah di ubah.');
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
                ->with('destroy','1 Pengumuman Telah Di Hapus.');
    }
}
