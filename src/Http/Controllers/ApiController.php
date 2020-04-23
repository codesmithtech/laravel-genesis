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
    
    public function created($data, $status = 201)
    {
        return response()->json($data, $status);
    }
    
    public function modified($data, $status = 202)
    {
        return response()->json($data, $status);
    }
    
    public function removed($data, $status = 202)
    {
        return response()->json($data, $status);
    }
}