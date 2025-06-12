<?php

namespace App\Http\Requests\Admin\Gallery;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateGalleryValidation extends FormRequest
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
            'title'               => ['required','max:100','string','unique:galleries,title,'.$this->id],
            'slug'               => ['required','max:150','string','unique:galleries,slug,'.$this->id],
            'nepali_title'       => ['nullable'],
            'main_photo'         => ['nullable'],
            'status'             => ['nullable'],
            'excerpt'             => ['nullable'],

        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug'      => Str::slug($this->title)
        ]);
    }
}
