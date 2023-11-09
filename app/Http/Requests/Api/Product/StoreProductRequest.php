<?php

namespace App\Http\Requests\Api\Product;

use App\Helpers\ErrorHelper;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        ErrorHelper::JsonFormat($validator);
    }

    public function rules(): array
    {
        return [
            'name'=>'required',
            'description'=>'nullable',
            'stock'=>'required',
            'price'=>'required',
            'store_id'=>'required|exists:stores,id'
        ];
    }
}
