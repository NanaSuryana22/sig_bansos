<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PendudukRequest extends FormRequest
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
        $id = $this->penduduk;
        return [
            'nik' => 'required|numeric',
            'nama' => 'required|min:2|max:80',
            'tempat_tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required|min:10',
            'agama' => 'required',
            'status_pernikahan' => 'required',
            'pekerjaan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nik.required' => 'Nomor Induk Kependudukan Wajib Diisi',
            'nik.numeric' => 'Nomor Induk Kependudukan harus berupa nomor',
            'nama.required' => 'Nama Lengkap Wajib Diisi',
            'nama.min' => 'Nama Kecamatan minimal 3 karakter',
            'nama.max' => 'Nama Kecamatan maksimal 50 karakter',
            'tempat_lahir.required' => 'Tempat Lahir Wajib Diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir Wajib Diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib dipilih',
            'alamat.required' => 'Alamat harus diisi',
            'alamat.min' => 'Isi alamat minimal 10 karakter',
            'agama.required' => 'Agama wajib dipilih',
            'status_pernikahan.required' => 'Status Pernikahan wajib dipilih',
            'pekerjaan.required' => 'Pekerjaan harus diisi'
        ];
    }
}
