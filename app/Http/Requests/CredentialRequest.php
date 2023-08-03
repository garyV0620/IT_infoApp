<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CredentialRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            // 'username' => 'string|regex:/^[a-zA-Z]+$/u|max:10',
            'username' => ['required', 'string', 'max:10', 'regex:/^[a-zA-Z]+$/u'],
            'password' => 'required|min:10'
        ];
    }


}
