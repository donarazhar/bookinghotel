<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHotelRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'link_gmaps' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
            'thumbnail' => ['required', 'image', 'mimes:png,jpg,jpeg'],
            'city_id' => ['required', 'integer'],
            'country_id' => ['required', 'integer'],
            'star_level' => ['required', 'integer'],
            'photos.*' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa teks.',
            'name.max' => 'Nama maksimal 255 karakter.',

            'link_gmaps.required' => 'Link Google Maps wajib diisi.',
            'link_gmaps.string' => 'Link Google Maps harus berupa teks.',
            'link_gmaps.max' => 'Link Google Maps maksimal 255 karakter.',

            'address.required' => 'Alamat wajib diisi.',
            'address.string' => 'Alamat harus berupa teks.',
            'address.max' => 'Alamat maksimal 255 karakter.',

            'thumbnail.required' => 'Thumbnail wajib diunggah.',
            'thumbnail.image' => 'Thumbnail harus berupa gambar.',
            'thumbnail.mimes' => 'Thumbnail harus berupa file dengan format: png, jpg, jpeg.',

            'city_id.required' => 'Kota wajib dipilih.',
            'city_id.integer' => 'Kota harus berupa angka.',

            'country_id.required' => 'Negara wajib dipilih.',
            'country_id.integer' => 'Negara harus berupa angka.',

            'star_level.required' => 'Tingkat bintang wajib diisi.',
            'star_level.integer' => 'Tingkat bintang harus berupa angka.',

            'photos.*.required' => 'Semua foto wajib diunggah.',
            'photos.*.image' => 'Setiap foto harus berupa gambar.',
            'photos.*.mimes' => 'Setiap foto harus berupa file dengan format: png, jpg, jpeg.',
        ];
    }
}
