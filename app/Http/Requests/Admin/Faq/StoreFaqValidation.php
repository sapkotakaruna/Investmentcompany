<?php

namespace App\Http\Requests\Admin\Faq;

use App\Models\AboutUs;
use App\Models\Partner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreFaqValidation extends FormRequest
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
            'question'               => ['required', 'max:150', 'string', 'unique:f_a_q_s,question'],
            'answer'             => ['required'],
            'rank'               => ['nullable'],
            'status'              => ['boolean'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'rank'      => Partner::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
