<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
class CrewInfoRequest extends FormRequest
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
        $rules = [
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'education' => 'required',
            'contact_details' => 'required',
        ];

        if ($this->isMethod('post')) {
            // For store (post) request
            $rules['email'] .= '|unique:it_crews,email';
        }

        return $rules;
    }
}
