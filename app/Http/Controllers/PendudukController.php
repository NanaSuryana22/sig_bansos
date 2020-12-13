<?php

namespace App\Http\Controllers;

use App\Penduduk;
use Illuminate\Http\Request;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pendudukQuery = Penduduk::query();
        $pendudukQuery->where('alamat', 'like', '%'.request('q').'%');
        $penduduks = $pendudukQuery->paginate(25);

        return view('penduduk.index', compact('penduduks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newPenduduk = $request->validate([
            'alamat'   => 'nullable|max:255',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
            'jenis_kelamin' => 'required',
            'keterangan' => 'required',

        ]);
        $newPenduduk['creator_id'] = auth()->id();

        $penduduk = Penduduk::create($newPenduduk);

        return redirect()->route('penduduk.show', $penduduk);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function show(Penduduk $penduduk)
    {
        return view('penduduk.show', compact('penduduk'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function edit(Penduduk $penduduk)
    {
        return view('penduduk.edit', compact('penduduk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Penduduk $penduduk)
    {
        $pendudukData = $request->validate([
            'alamat'   => 'nullable|max:255',
            'latitude'  => 'nullable|required_with:longitude|max:15',
            'longitude' => 'nullable|required_with:latitude|max:15',
            'jenis_kelamin' => 'required',
            'keterangan' => 'required',
        ]);
        $penduduk->update($pendudukData);

        return redirect()->route('penduduk.show', $penduduk);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Penduduk $penduduk)
    {
        $request->validate(['penduduk_id' => 'required']);

        if ($request->get('penduduk_id') == $penduduk->id && $penduduk->delete()) {
            return redirect()->route('penduduk.index');
        }

        return back();
    }
}
