<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateUserRequest extends FormRequest
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
        $id = $this->route('id');
        return [
            'name'     => [
                'max:255', 
                'required'
            ],
            'email'    => [
                'max:255', 
                'email', 
                'required', 
                Rule::unique('users', 'email')->ignore($id)
            ],
            'password' => [
                'min:8', 
                'required'
            ],
        ];
    }
}