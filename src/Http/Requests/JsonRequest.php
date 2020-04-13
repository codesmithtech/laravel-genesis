<?php
namespace CodeSmithTech\Genesis\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class JsonRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    
    protected function in(array $keysAndValues): string
    {
        return implode(',', array_keys($keysAndValues));
    }
    
    abstract public function rules(): array;
}