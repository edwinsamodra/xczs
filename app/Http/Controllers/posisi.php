<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class posisi extends Controller
{
    function save(Request $request){        
        $request->session()->put('posisi', $request->b);
        $request->session()->put('posisiSub', $request->c);
    }
}
