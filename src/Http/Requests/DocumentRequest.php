<?php

namespace Sebbaum\Legal\Http\Requests;

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
     * @return array
     */
    public function rules()
    {
        return [
            // TODO: add sometimes validation
//            'id' => 'required',
            'type' => 'required|in:imprint,tos,pripol',
            'content' => 'required'
        ];
    }
}
