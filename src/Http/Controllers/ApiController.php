<?php

namespace CodeSmithTech\Genesis\Http\Controllers;

use Illuminate\Routing\Controller;

class ApiController extends Controller
{
    public function ok($data)
    {
        return response()->json($data);
    }
    
    public function validationError($fieldName, $message, $status = 400)
    {
        return response([
            'errors' => [
                $fieldName => [$message],
            ]
        ], $status);
    }
    
    public function error($data, $status = 500)
    {
        return response()->json($data, $status);
    }
}