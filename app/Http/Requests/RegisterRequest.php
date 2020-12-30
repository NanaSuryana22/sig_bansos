<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $id = $this->register;
        return [
            'name' => 'required|string|max:50',
            'email' => 'required|string|email|max:50|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ];
    }

    public function message()
    {
        return [
            'name.required' => 'Nama Lengkap Wajib Diisi',
            'name.string' => 'Nama Lengkap harus harus diisi dengan huruf',
            'name.max' => 'Nama Lengkap maksimal 50 karakter',
            'email.required' => 'Email Wajib Diisi',
            'email.string' => 'Email harus berupa angka maupun huruf',
            'email.email' => 'Format E-Mail harus benar',
            'email.max' => 'Email maksimal 50 karakter',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password Wajib Diisi',
            'password.string' => 'Password harus berupa angka dan huruf',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Password tidak sama'
        ];
    }
}
