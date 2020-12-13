<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendudukMapController extends Controller
{
    /**
     * Show the Penduduk listing in LeafletJS map.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('penduduk.map');
    }
}
