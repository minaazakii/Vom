<?php

namespace App\Http\Requests\Api\Store;

use App\Helpers\ErrorHelper;
use Illuminate\Foundation\Http\FormRequest;

class StorestoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
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
            'include_vat_in_price' => 'required|boolean',
            'vatType'=> 'required_if:include_vat_in_price,true|in:percentage,fixed',
            'value'=>'required_if:include_vat_in_price,true',
            'shipping_cost'=>'required'
        ];
    }
}
