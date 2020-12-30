<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenyaluranRequest extends FormRequest
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
        $id = $this->penyaluran;
        return [
            'bantuan_id' => 'required',
            'kecamatan_id' => 'required',
            'desa_id' => 'required',
            'quota' => 'required|numeric|min:1'
        ];
    }

    public function messages()
    {
        return [
            'bantuan_id.required' => 'Jenis Bantuan Wajib Dipilih',
            'kecamatan_id.required' => 'Kecamatan Wajib Dipilih',
            'desa_id.required' => 'Desa Wajib Dipilih',
            'quota.required' => 'Silahkan Isi Jumlah Bantuan Yang Akan Disalurkan',
            'quota.numeric' => 'Isian Quota Harus Berupa Number',
            'quota.min' => 'Jumlah Yang disalurkan tidak bisa kurang dari 1'
        ];
    }
}
