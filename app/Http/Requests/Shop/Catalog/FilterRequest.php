<?php

namespace App\Http\Requests\Shop\Catalog;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'title' => 'required|string',
            'price' => 'nullable|numeric',
            'brand_id' => 'required|integer',
            'color_id' => 'nullable|integer',
            'category_id' => 'nullable|integer',
            'group_id' => 'nullable|integer',
            'tags_ids' => 'nullable|array',
        ];
    }
}
