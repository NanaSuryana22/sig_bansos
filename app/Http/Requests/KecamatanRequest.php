<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KecamatanRequest extends FormRequest
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
        $id = $this->kecamatan;
        return [
            'nama' => 'required|min:3|max:50',
            'user_id' => 'required|unique:kecamatan,user_id',
            'long' => 'required|numeric',
            'lat' => 'required|numeric'
        ];
    }

    public function messages()
    {
        return [
            'nama.required' => 'Nama Kecamatan Wajib Diisi',
            'nama.min' => 'Nama Kecamatan minimal 3 karakter',
            'nama.max' => 'Nama Kecamatan maksimal 50 karakter',
            'user_id.required' => 'Tentukan User Untuk Dijadikan Petugas Kecamatan',
            'user_id.unique' => 'User yang dipilih sudah ada',
            'long.required' => 'Silahkan Tentukan Titik Koordinat (Longitude) lewat Peta',
            'lat.required' => 'Silahkan Tentukan Titik Koordinat (Latitude) lewat Peta',
            'lat.numeric' => 'Inputan Harus berupa titik koordinat',
            'long.numeric' => 'Inputan Harus berupa titik koordinat',
        ];
    }
}
