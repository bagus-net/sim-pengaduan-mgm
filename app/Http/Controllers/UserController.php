<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;

class UserController extends Controller
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
        return view('admin.user.index', compact('users'))
                ->with('i',(request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/user/create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        User::create([
            'name' => $request['name'],
            'foto' => $request['foto'],
            'level' => $request['level'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);return redirect ('admin/user')->with('success','Data Has Been Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin/user/show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
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
               User::whereId($user->id)->update([
                "name"     => $request->name,
                'email'     => $request->email,
                "foto"        => $namaBaru,
                ]);  
        return redirect ('admin/user')->with('warning','Data Telah di ubah.');
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
        return view('admin.user.profile',compact('user'));  
    }
    public function updatedong(Request $request, User $user)
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
               User::whereId($user->id)->update([
                "name"     => $request->name,
                'email'     => $request->email,
                "foto"        => $namaBaru,
                ]);  
        return redirect ('admin/masyarakat')->with('warning','Data Telah di ubah.');
    }
     public function heyupdate(Request $request, User $user)
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
               User::whereId(auth()->user()->id)->update([
                "name"     => $request->named,
                'email'     => $request->email,
                "foto"        => $namaBaru,
                ]);  
        return back()->with('warning','Data Telah di ubah.');
    }
}
