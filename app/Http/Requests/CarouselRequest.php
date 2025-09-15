<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselRequest extends FormRequest
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
        $rules = [
            'title' => 'required|string|max:255',
            'is_active' => 'boolean',
        ];

        // Image validation - required for create, optional for update
        if ($this->isMethod('post')) {
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,webp|max:10240'; // 10MB
        } else {
            $rules['image'] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:10240'; // 10MB
        }

        return $rules;
    }

    /**
     * Get custom validation messages in Indonesian.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'title.required' => 'Judul wajib diisi.',
            'title.string' => 'Judul harus berupa teks.',
            'title.max' => 'Judul tidak boleh lebih dari 255 karakter.',
            'image.required' => 'Gambar wajib diupload.',
            'image.image' => 'File yang diupload harus berupa gambar.',
            'image.mimes' => 'Format gambar harus JPEG, PNG, JPG, GIF, atau WebP.',
            'image.max' => 'Ukuran gambar tidak boleh lebih dari 10MB.',
            'is_active.boolean' => 'Status aktif harus berupa nilai boolean.',
        ];
    }
}
