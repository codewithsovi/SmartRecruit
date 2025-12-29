<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use \App\Models\Kriteria;
use \App\Models\User;
use \App\Models\Kandidat;
use \App\Models\Jabatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::count();
        $kriterias = Kriteria::count();
        $kandidats = Kandidat::count();
        $jabatans = Jabatan::count();
        $data = [
            'users' => $users,
            'kriterias' => $kriterias,
            'kandidats' => $kandidats,
            'jabatans' => $jabatans,    
        ];
        return view('dashboard', $data);
    }

}