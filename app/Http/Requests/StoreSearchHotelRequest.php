<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSearchHotelRequest extends FormRequest
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
            'keyword' => ['required', 'string', 'max:255'],
            'checkin_at' => ['required', 'date'],
            'checkout_at' => ['required', 'date', 'after:today'],
        ];
    }

    public function messages()
    {
        return [
            'keyword.required' => 'Kolom search hotel harus diisi.',
            'checkin_at.required' => 'Kolom tanggal checkin harus diisi.',
            'checkout_at.required' => 'Kolom tanggal checkout harus diisi.',
            'checkout_at.after' => 'Checkout harus tanggal selanjutnya.',
        ];
    }
}
