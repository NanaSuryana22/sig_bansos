<?php

namespace App\Http\Controllers;

use App\Penduduk;
use App\Penyaluran;
use App\Imports\PendudukImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\PendudukRequest;

class PendudukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penyaluran = Penyaluran::where('status_tracking_desa', 'Diterima')->orderBy('updated_at', 'desc')->paginate(10);
        return view('penduduk.index')->with('penyaluran', $penyaluran);
    }

    public function import_excel(Request $request) 
	{
		// validasi
		$this->validate($request, [
			'file' => 'required|mimes:csv,xls,xlsx'
        ]);

		// menangkap file excel
		$file = $request->file('file');

		// membuat nama file unik
		$nama_file = rand().$file->getClientOriginalName();

		// upload ke folder file_penduduk di dalam folder public
		$file->move('file_penduduk',$nama_file);

		// import data
		Excel::import(new PendudukImport, public_path('/file_penduduk/'.$nama_file));

		// notifikasi dengan session
		Session::flash("notice",'Data Penduduk Berhasil Diimport!');

		// alihkan halaman kembali
		return back();
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
    public function show($id)
    {
        $penduduk = Penduduk::where('penyaluran_id', $id)->paginate(10);
        $penyaluran = Penyaluran::find($id);
        return view('penduduk.show')->with('penduduk', $penduduk)->with('penyaluran', $penyaluran);
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
    public function update(Request $request, $id)
    {
        $penduduk = Penduduk::find($id);
        $penduduk->penyaluran_id = $request->penyaluran_id;
        $penduduk->nik = $request->nik;
        $penduduk->nama = $request->nama;
        $penduduk->jenis_kelamin = $request->jenis_kelamin;
        $penduduk->tempat_tanggal_lahir = "{$request->tempat_lahir}, {$request->tanggal_lahir}";
        $penduduk->alamat = $request->alamat;
        $penduduk->agama = $request->agama;
        $penduduk->status_pernikahan = $request->status_pernikahan;
        $penduduk->pekerjaan = $request->pekerjaan;
        $penduduk->save();

        Session::flash("notice", "Data Penerima BanSos terpilih berhasil diupdate");
        return redirect()->route('penduduk.show', $penduduk->penyaluran_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penduduk  $penduduk
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penduduk::destroy($id);
        Session::flash("notice", "Penduduk terpilih berhasil dihapus");
        return back();
    }
}
