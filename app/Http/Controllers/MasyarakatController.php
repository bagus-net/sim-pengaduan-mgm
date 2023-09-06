<?php

namespace App\Http\Controllers;

use App\User;
use App\Masyarakat;
use App\Profile;


use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;

class MasyarakatController extends Controller
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
        $users = User::first()->paginate(10);
        return view('admin.masyarakat.index', compact('users'))
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Masyarakat $user)
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

               Profile::whereId($user->id)->update([
                "nik"     => $request->nike,
                "name"     => $request->name,
                "telp"     => $request->telp,
                'email'     => $request->email,
                "foto"        => $namaBaru,
                ]);  
       return redirect ('admin/masyarakat')->with('success','Data Has Been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()
                ->with('destroy','1 User Telah Di Hapus.');
    }
    public function showing($id){
        $user = \App\User::find($id);
        return view('admin.masyarakat.show',compact('user'));  
    }
     public function profile($id){
        $user = \App\Masyarakat::find($id);
        return view('admin.masyarakat.ubah-masyarakat',compact('user'));  
    }
}
