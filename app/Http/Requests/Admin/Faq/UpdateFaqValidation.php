<?php

namespace App\Http\Requests\Admin\Faq;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateFaqValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //    public function authorize()
    //    {
    //        return false;
    //    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'question'               => ['required', 'max:150', 'string', 'unique:f_a_q_s,question,' . $this->id],
            'answer'                 => ['required'],
            'status'                 => ['boolean'],

        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
