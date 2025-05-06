<?php

namespace App\Http\Requests\Shop\Order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'address_id' => 'required|integer',
            'phone' => 'required|string|size:12|regex:/^\+7\d{10}$/',
            'payment_method' => 'required|string',
            'delivery_method' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.regex' => 'Формат телефона должен быть +7...',
            'phone.size' => 'Формат телефона должен иметь 12 символов',
        ];
    }
}
