<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PenggunaRequest extends FormRequest
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
        $id = $this->user;
        return [
            'name' => 'required|min:3|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Nama Pengguna Wajib Diisi',
            'name.max' => 'Nama Pengguna maksimal 50 karakter',
            'name.min' => 'Nama Pengguna minimal 3 karakter',
            'email.required' => 'Email Wajib Diisi',
            'email.string' => 'Email harus berupa angka maupun huruf',
            'email.email' => 'Format E-Mail harus benar',
            'email.max' => 'Email maksimal 50 karakter',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password Wajib Diisi',
            'password.string' => 'Password harus berupa angka dan huruf',
            'password.min' => 'Password minimal 6 karakter',
            'password.same' => 'Password tidak sama',
            'password.required_with' => 'Harap Isi Konfirmasi Password',
            'password_confirmation.min' => 'Konfirmasi Password minimal 6 karakter'
        ];
    }
}
