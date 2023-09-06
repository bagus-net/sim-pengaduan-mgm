<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PetugasUserController extends Controller
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
        $users = User::first()->paginate(10);
        return view('petugas.user.show', compact('users', 'jmlh_blm'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    public function show(User $user)
    {
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        return view('petugas/user/show', compact('user', 'jmlh_belum'));
    }

    public function showing($id)
    {
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        $user = \App\User::find($id);
        return view('petugas.user.profile', compact('user', 'jmlh_belum'));
    }
}
