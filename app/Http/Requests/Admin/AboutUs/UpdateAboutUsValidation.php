<?php

namespace App\Http\Requests\Admin\AboutUs;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateAboutUsValidation extends FormRequest
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
            'title'              => ['required', 'max:150', 'string'],
            'nepali_title'       => ['nullable'],
            'email'              => ['nullable'],
            'slug'               => ['required', 'max:150'],
            'status'             => ['nullable'],
            'excerpt'            => ['nullable'],
            'map_link'            => ['nullable'],
            'isbranch'            => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'status' => $this->status ? 1 : 0,
            'isbranch' => $this->isbranch ? 1 : 0,
        ]);
    }
}
