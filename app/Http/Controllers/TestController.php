<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Klinik;

class TestController extends Controller
{
    public function index(Request $request)
    {
        $klinik = new Klinik;
        // $profil = $klinik->get_klinik('R00001');
        $ls = $klinik->get_field_names();
        echo '<pre>';echo $ls;echo '</pre>';
    }
}
