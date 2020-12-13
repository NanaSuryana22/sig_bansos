<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BantuanRequest extends FormRequest
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
            'quota.required' => 'Quota Harus Diisi',
            'quota.numeric' => 'Quota harus berupa angka',
            'bantuan_berupa.required' => 'Bantuan Berupa wajib dipilih',
            'tanggal_dikeluarkan.required' => 'Tanggal Dikeluarkan wajib diisi',
            'tanggal_dikeluarkan.date' => 'Tanggal Dikeluarkan harus berformat tanggal',
            'status.required' => 'Status wajib dipilih',
        ];
    }
}
