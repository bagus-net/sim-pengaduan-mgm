<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index()
    {
        $jmlh_belum = Pengaduan::where('status', 'proses')->orwhere('status', 'verivied')->get()->count();
        return view('petugas.dashboard', compact('jmlh_belum'));
    }
}
