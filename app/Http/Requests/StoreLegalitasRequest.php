<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreLegalitasRequest extends FormRequest
{
    public function authorize(): bool { return true; }

    public function rules(): array
    {
        return [
            'nama' => ['required','string','max:120'],
            'penerbit' => ['nullable','string','max:120'],
            'deskripsi' => ['nullable','string']
        ];
    }
}