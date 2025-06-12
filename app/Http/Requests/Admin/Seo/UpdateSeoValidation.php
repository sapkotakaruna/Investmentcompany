<?php

namespace App\Http\Requests\Admin\Seo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateSeoValidation extends FormRequest
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
            'title'               => ['required', 'max:100', 'string', 'unique:seos,title,' . $this->id],
            'type'              => ['nullable', 'max:100', 'string'],
            'language'              => ['nullable', 'max:100', 'string'],
            'subject'              => ['nullable', 'max:100', 'string'],
            'topic'              => ['nullable', 'max:100', 'string'],
            'summary'              => ['nullable', 'max:100', 'string'],
            'domain'              => ['required', 'max:100', 'string'],
            'category'              => ['nullable', 'max:100', 'string'],
            'description'              => ['nullable', 'string'],
            'keyword'              => ['nullable', 'string'],
        ];
    }
}
