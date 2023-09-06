<?php

namespace App\Http\Controllers;

use App\komentar;
use Illuminate\Http\Request;

class PetugasKomentarController extends Controller
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
        $komentars = Komentar::latest()->paginate(20);
        return view('petugas.komentar.index',compact('komentars'))
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
     * @param  \App\komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function show(komentar $komentar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function edit(komentar $komentar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, komentar $komentar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\komentar  $komentar
     * @return \Illuminate\Http\Response
     */
    
    public function delete ($id){
        $komentar = \App\Komentar::find($id);
        $komentar->delete();
        return back()->with('destroy','Pengumuman Berhasil Di Hapus');
    }
}
