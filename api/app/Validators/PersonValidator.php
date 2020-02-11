<?php

namespace App\Validators;

use Illuminate\Support\Facades\Validator;

class PersonValidator
{
    /**
     * Validator
     *
     * @param [type] $request
     * @return void
     */
    public static function validatePerson($request)
    {
        $rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email'
        ];

        return Validator::make($request->all(), $rules);
    }
}
