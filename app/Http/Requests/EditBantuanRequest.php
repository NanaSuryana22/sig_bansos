<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditBantuanRequest extends FormRequest
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
        $id = $this->bantuan;
        return [
            'nama_bantuan' => 'required|min:3|max:50',
            'image' => 'image|mimes:jpeg,png,jpg|min:5|max:7000',
            'quota' => 'required|numeric',
            'bantuan_berupa' => 'required',
            'tanggal_dikeluarkan' => 'required|date',
            'status' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'nama_bantuan.required' => 'Nama Bantuan Harus Diisi',
            'nama_bantuan.min' => 'Isi minimal 3 karakter',
            'nama_bantuan.max' => 'Isi maksimal 50 karakter',
            'image.image' => 'File yang diupload harus berupa gambar',
            'image.mimes' => 'Format gambar yang didukung adalah .jpeg, .jpg, dan .png',
            'image.min' => 'Ukuran Gambar Minimal 5 Kilobytes',
            'image.max' => 'Ukuran Gambar Maksimal 7 Megabytes',
            'quota.required' => 'Quota Harus Diisi',
            'quota.numeric' => 'Quota harus berupa angka',
            'bantuan_berupa.required' => 'Bantuan Berupa wajib dipilih',
            'tanggal_dikeluarkan.required' => 'Tanggal Dikeluarkan wajib diisi',
            'tanggal_dikeluarkan.date' => 'Tanggal Dikeluarkan harus berformat tanggal',
            'status.required' => 'Status wajib dipilih',
        ];
    }
}
