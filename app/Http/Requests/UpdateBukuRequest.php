<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBukuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    return [
    'judul' => 'sometimes|string|max:255',
    'penulis' => 'sometimes|string|max:255',
    'tahun_terbit' => 'sometimes|date',
    'deskripsi' => 'sometimes|string',
    'gambar' => 'sometimes|image|mimes:jpg,jpeg,png|max:2048',
];

}

}
