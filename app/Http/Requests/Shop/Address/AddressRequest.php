<?php

namespace App\Http\Requests\Shop\Address;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            'name' => 'required|string',
            'country' => 'required|string',
            'city' => 'required|string',
            'street' => 'required|string',
            'house' => 'required|integer',
            'postcode' => 'required|integer',
        ];
    }
}
