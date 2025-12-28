<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = \App\Models\User::count();
        $kriterias = \App\Models\Kriteria::count();
        $kandidats = \App\Models\Kandidat::count();
        $jabatans = \App\Models\Jabatan::count();
        $data = [
            'users' => $users,
            'kriterias' => $kriterias,
            'kandidats' => $kandidats,
            'jabatans' => $jabatans,    
        ];
        return view('dashboard', $data);
    }

}