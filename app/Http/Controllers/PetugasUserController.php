<?php

namespace App\Http\Controllers;

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
        $users = User::first()->paginate(10);
        return view('petugas.user.show', compact('users'))
                ->with('i',(request()->input('page', 1) -1) *5);
    }

   
    public function show(User $user)
    {
        return view('petugas/user/show',compact('user'));
    }

     public function showing($id){
        $user = \App\User::find($id);
        return view('petugas.user.profile',compact('user'));  
    }
}
