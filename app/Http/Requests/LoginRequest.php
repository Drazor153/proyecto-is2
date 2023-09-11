<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Factory as ValidationFactory;
use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {           
        return [
            'name' => 'required',
            'password' => 'required',
        ];
    }

    public function getCredentials(){
        $username = $this->get('name');
        if($this->isEmail($username)){
            return [
                'email' => $username,
                'password' => $this->get('password')
            ];
        }
        return $this->only('name', 'password');
    }

    public function isEmail($value): bool{
        $factory = $this->container->make(ValidationFactory::class);

        return !$factory->make(['name' => $value], ['name' => 'email'])->fails();
    }
}
