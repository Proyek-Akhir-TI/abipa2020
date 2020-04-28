<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KetuaController extends Controller
{
    //
    public function __construct(){
        $this->middleware('IsKetua');
    }

    public function index(){

        return view('ketua.index');

    }
}
