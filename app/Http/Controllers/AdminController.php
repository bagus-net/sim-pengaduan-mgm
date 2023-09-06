<?php

namespace App\Http\Controllers;

use App\User;
use App\Masyarakat;
use App\Pengaduan;
use Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
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
        $pengaduan = Pengaduan::all();
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        $jmlh_user = user::where('level', 'admin')->orwhere('level', 'petugas')->get()->count();
        $jmlh_pengaduan = $pengaduan->count();
        $jmlh_done = Pengaduan::where('status', 'selesai')->get()->count();
        $jmlh_customer = user::where('level', 'masyarakat')->get()->count();

        return view('admin.dashboard', compact('pengaduan', 'jmlh_user', 'jmlh_pengaduan', 'jmlh_belum', 'jmlh_done', 'jmlh_customer'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
