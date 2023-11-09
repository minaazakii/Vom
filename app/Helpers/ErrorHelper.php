<?php

namespace App\Helpers;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ErrorHelper
{
    public static function JsonFormat(Validator $validator)
    {
        $errors = $validator->errors();
        throw new HttpResponseException(response()->json([
            'message' => 'Validation Errors',
            'errors' => $errors
        ], 422));
    }
}
