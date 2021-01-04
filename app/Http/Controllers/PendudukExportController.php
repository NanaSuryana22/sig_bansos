<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Penduduk;
use App\Penyaluran;
use App\Exports\PendudukExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class PendudukExportController extends Controller
{

		public function export($id)
		{
			$query = Penduduk::where('penyaluran_id', $id)->get();
			$penyaluran = Penyaluran::where('id', $id)->get();
			return Excel::download(new PendudukExport($query, $penyaluran), "Data Warga Penerima BanSos.xlsx");
		}
}
