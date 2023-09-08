<?php

namespace App\Http\Controllers\RumahSakit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengaturanController extends Controller
{
    //
    public function index()
    {
        return view('apkrs.RumahSakit.Pengaturan.index');
    }
}
