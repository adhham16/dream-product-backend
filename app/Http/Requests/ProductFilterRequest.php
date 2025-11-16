<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFilterRequest extends FormRequest
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
            'category'      => ['sometimes', 'string'],
            'stock_status'  => ['sometimes', 'in:in_stock,out_of_stock,low_stock'],
            'min_price'     => ['sometimes', 'numeric', 'min:0'],
            'max_price'     => ['sometimes', 'numeric', 'min:0'],
            'per_page'      => ['sometimes', 'integer', 'min:1', 'max:100'],
            'sort_by'       => ['sometimes', 'in:name,price,created_at'],
            'sort_dir'      => ['sometimes', 'in:asc,desc'],
        ];
    }
}
