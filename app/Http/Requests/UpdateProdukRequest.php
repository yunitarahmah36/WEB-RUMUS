<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProdukRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nama' => ['required','string','max:150'],
            'kategori_id' => ['nullable','exists:kategoris,id'],
            'umkm_id' => ['nullable','exists:umkms,id'],
            'deskripsi_singkat' => ['nullable','string','max:200'],
            'deskripsi_lengkap' => ['nullable','string'],
            'harga' => ['required','numeric','min:0'],
            'is_active' => ['boolean'],
            'legalitas' => ['array'],
            'legalitas.*' => ['exists:legalitas,id'],
            'links.shopee' => ['nullable','url'],
            'links.tiktok' => ['nullable','url'],
            'links.tokopedia' => ['nullable','url'],
            'links.lazada' => ['nullable','url'],
            'images.*' => ['image','mimes:jpeg,png,jpg,webp','max:2048'],
            'cover_index' => ['nullable','integer','min:0']
        ];
    }
}