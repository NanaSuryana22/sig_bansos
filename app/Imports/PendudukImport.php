<?php

namespace App\Imports;

use App\Penduduk;
use Maatwebsite\Excel\Concerns\ToModel;

class PendudukImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Penduduk([
            'penyaluran_id' => $row[1],
            'nik' => $row[2],
            'nama' => $row[3],
            'jenis_kelamin' => $row[4],
            'tempat_tanggal_lahir' => $row[5],
            'alamat' => $row[6],
            'agama' => $row[7],
            'status_pernikahan' => $row[8],
            'pekerjaan' => $row[9],
        ]);
    }
}
