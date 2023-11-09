<?php

namespace App\Helpers;

use Illuminate\Contracts\Validation\Validator;

class ErrorHelper
{
    public static function JsonFormat(Validator $validator)
    {
        $errors = $validator->errors();
        return response()->json([
            'message' => 'Validation Errors',
            'errors' => $errors
        ], 422);
    }
}
