<?php

namespace App\Http\Controllers;

use App\Tanggapan;
use App\Pengaduan;

use Illuminate\Http\Request;
use PDF;


class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengaduan = Tanggapan::all();
        return view('admin/laporan/index', compact('pengaduan'));
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pengaduan  $pengaduan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        //
    }
    public function cetak_pdf()
    {
        $tanggapan = Tanggapan::all();

        $pdf = PDF::loadView('pengaduan_pdf',compact('tanggapan'))->setPaper('a4', 'landscape');
        $pdf->save(storage_path().'_filename.pdf');
        return $pdf->stream();
    }
    // public function cetak_pdf()
    // {
    //     $tanggapan = Tanggapan::all();
    //     $pdf = PDF::loadView('invoice.print', compact('tanggapan'))->setPaper('a4', 'landscape');
    //      return $pdf->stream();
    // }
}
