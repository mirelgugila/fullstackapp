<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function returnSucces($data) {
        return response()->json([
            'response_type' => 'success',
            'data'=>$data,
            'error_message' => null
        ]);
    }
    public function returnError($errorMessage, $code = 400) {
        return response()->json([
            'response_type' => 'error',
            'data'=>null,
            'error_message' => $errorMessage
        ], $code);
    }

}
