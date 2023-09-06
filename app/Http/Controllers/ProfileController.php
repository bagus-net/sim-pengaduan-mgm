<?php

namespace App\Http\Controllers;

use App\Profile;
use App\User;
use App\Pengaduan;
use App\Pengaduans;
Use Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;

class ProfileController extends Controller
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
        $pengaduans = Pengaduan::latest()->paginate(5);
        $laporansaya = Pengaduan::all();
        return view('profile',compact('pengaduans','laporansaya'));
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
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Profile $profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $profile)
    {
        $fotoLama = $request->fotoLama;
            $foto = $request->file('foto');
            if(!empty($foto)){
                $foto = $request->file('foto');
                $namaBaru = Carbon::now()->timestamp . '_' . '.' . $foto->getClientOriginalExtension();
                $foto->move(public_path('upload/'),$namaBaru);
            }else{
                $foto = $fotoLama;
                $namaBaru = $foto;
            }

               Profile::whereId(auth()->user()->id)->update([
                "nik"     => $request->nike,
                "name"     => $request->name,
                "telp"     => $request->telp,
                'email'     => $request->email,
                "foto"        => $namaBaru,
                ]);  
       return redirect ('profile')->with('success','Data Has Been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan = \App\Pengaduans::find($id);
        $pengaduan->delete();
        return back();
    }
    public function delete ($id){
        $pengaduan = \App\Pengaduans::find($id);
        $pengaduan->delete();
        return back()->with('sukses','Data Berhasil Di Hapus');
    }
}
