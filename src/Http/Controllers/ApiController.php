<?php
namespace CodeSmithTech\Genesis\Http\Controllers;

use CodeSmithTech\Kiln\UserBase\Entity\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use InvalidArgumentException;

/**
 * @property User $user
 */
class ApiController extends Controller
{
    public function ok($data = '')
    {
        return response()->json($data);
    }
    
    public function validationError($fieldName, $message, $status = 422)
    {
        return response([
            'errors' => [
                $fieldName => [$message],
            ]
        ], $status);
    }
    
    public function error($data = '', $status = 500)
    {
        return response()->json($data, $status);
    }
    
    public function created($data = '', $status = 201)
    {
        return response()->json($data, $status);
    }
    
    public function modified($data = '', $status = 202)
    {
        return response()->json($data, $status);
    }
    
    public function removed($data = '', $status = 202)
    {
        return response()->json($data, $status);
    }
    
    public function __get($name)
    {
        if ($name === 'user') {
            return Auth::user();
        }
        
        throw new InvalidArgumentException("Cannot find $name");
    }
}