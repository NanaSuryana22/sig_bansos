<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PelaporanRequest extends FormRequest
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
            'phone_number' => 'required|min:10|max:12|',
            'long' => 'required|numeric',
            'lat' => 'required|numeric',
            'image_1' => 'required|image|mimes:jpeg,png,jpg|min:5|max:7000',
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
            'phone_number.required' => 'Nomor Handphone wajib diisi',
            'phone_number.min' => 'Nomor Handphone harus berisi minimal 10 digit',
            'phone_number.max' => 'Nomor Handphone harus berisi maksimal 12 digit',
            'long.required' => 'Silahkan Tentukan Titik Koordinat (Longitude) lewat Peta',
            'lat.required' => 'Silahkan Tentukan Titik Koordinat (Latitude) lewat Peta',
            'lat.numeric' => 'Inputan Harus berupa titik koordinat',
            'long.numeric' => 'Inputan Harus berupa titik koordinat',
            'image_1.required' => 'Setidaknya upload 1 gambar',
            'image_1.image' => 'File yang diupload harus berupa gambar',
            'image_1.mimes' => 'Format gambar yang didukung adalah .jpeg, .jpg, dan .png',
            'image_1.min' => 'Ukuran Gambar Minimal 5 Kilobytes',
            'image_1.max' => 'Ukuran Gambar Maksimal 7 Megabytes',
            'desciption.required' => 'Deskripsi wajib diisi',
            'desciption.min' => 'Deskripsi minimal 10 karakter',
        ];
    }
}
