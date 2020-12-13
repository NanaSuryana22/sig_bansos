<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DesaRequest extends FormRequest
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
        $id = $this->desa;
        return [
            'kecamatan_id' => 'required|unique:desa,kecamatan_id',
            'user_id' => 'required|unique:desa,user_id',
            'nama_desa' => 'required|min:3|max:50',
            'alamat' => 'required|min:5|max:255',
            'long' => 'required|numeric',
            'lat' => 'required|numeric',
            'deskripsi' => 'required|min:3',
        ];
    }

    public function messages()
    {
        return [
            'user_id.required' => 'Tentukan User Untuk Dijadikan Petugas Desa',
            'user_id.unique' => 'User yang dipilih sudah ada',
            'kecamatan_id.required' => 'Kecamatan Wajib Dipilih',
            'kecamatan_id.unique' => 'Kecamatan Yang dipilih sudah ada',
            'nama_desa.required' => 'Nama Desa Wajib Diisi',
            'nama_desa.min' => 'Nama Desa minimal 3 karakter',
            'nama.max' => 'Nama Desa maksimal 50 karakter',
            'alamat.required' => 'Alamat Wajib Diisi',
            'alamat.min' => 'Alamat minimal 5 karakter',
            'alamat.max' => 'Alamat maksimal 255 karakter',
            'long.required' => 'Silahkan Tentukan Titik Koordinat (Longitude) lewat Peta',
            'lat.required' => 'Silahkan Tentukan Titik Koordinat (Latitude) lewat Peta',
            'lat.numeric' => 'Inputan Harus berupa titik koordinat',
            'long.numeric' => 'Inputan Harus berupa titik koordinat',
            'deskripsi.required' => 'Deskripsi wajib diisi',
            'deskripsi.min' => 'Deskripsi minimal 3 karakter',
        ];
    }
}
