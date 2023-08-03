<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
            'code' => 'required',
            'name' => 'required',
            'document_number' => 'required|integer',
            'date_issued' => 'required|date',
            'date_expiry' => 'required|date',
            'remarks' => 'required',
            'it_crew_id' => 'min:1',
        ];
    }
}
