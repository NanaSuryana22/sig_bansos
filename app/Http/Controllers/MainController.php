<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function __construct() {
        $this->middleware('auth', ['except' => ['welcome']]);
    }

    public function index(Request $request) {
        if($request->user()->hasRole(['dinas_sosial']))
        {
            return redirect()->route('dinas_sosial');
        }
        elseif($request->user()->hasRole(['kecamatan']))
        {
            return redirect()->route('kecamatan');
        }
        elseif($request->user()->hasRole(['desa']))
        {
            return redirect()->route('desa');
        }
        elseif($request->user()->hasRole(['masyarakat']))
        {
            return redirect()->route('masyarakat');
        }
    }

    public function welcome() {
        return view('home');
    }
}
