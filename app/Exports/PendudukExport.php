<?php

namespace App\Exports;

use App\Penduduk;
use App\Penyaluran;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PendudukExport implements FromView,ShouldAutoSize
{

    use Exportable;

    private $results  = [];

    public function __construct($query, $penyaluran){
        $this->results = $query;
        $this->data_penyaluran = $penyaluran[0];
    }

    public function view(): View
    {
        return view('exports.penduduk_export_sheet', [
            'results' => $this->results,
            'data_penyaluran' => $this->data_penyaluran
        ]);
    }
}
