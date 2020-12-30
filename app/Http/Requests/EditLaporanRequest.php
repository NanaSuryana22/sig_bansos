<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditLaporanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $id = $this->pelaporan;
        return [
            'judul_laporan' => 'required|min:5|max:255',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',
            'alamat' => 'required|min:5|max:255',
            'long' => 'required|numeric',
            'lat' => 'required|numeric',
            'desciption' => 'required|min:10'
        ];
    }

    public function messages()
    {
        return [
            'judul_laporan.required' => 'Judul Laporan Wajib Diisi',
            'judul_laporan.min' => 'Judul laporan harus berisi minimal 5 karakter',
            'judul_laporan.max' => 'Judul laporan maksimal 255 karakter',
            'kecamatan_id.required' => 'Kecamatan Wajib Dipilih',
            'desa_id.required' => 'Desa Wajib Dipilih',
            'nama.max' => 'Nama Desa maksimal 50 karakter',
            'alamat.required' => 'Alamat Wajib Diisi',
            'alamat.min' => 'Alamat minimal 5 karakter',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'long.required' => 'Silahkan Tentukan Titik Koordinat (Longitude) lewat Peta',
            'lat.required' => 'Silahkan Tentukan Titik Koordinat (Latitude) lewat Peta',
            'lat.numeric' => 'Inputan Harus berupa titik koordinat',
            'long.numeric' => 'Inputan Harus berupa titik koordinat',
            'desciption.required' => 'Deskripsi wajib diisi',
            'desciption.min' => 'Deskripsi minimal 10 karakter',
        ];
    }
}
