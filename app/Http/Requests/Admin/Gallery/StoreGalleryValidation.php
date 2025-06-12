<?php

namespace App\Http\Requests\Admin\Gallery;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreGalleryValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
//    public function authorize()
//    {
//        return true;
//    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'              => ['required','max:150','string','unique:galleries'],
            'slug'               => ['required','max:150','string','unique:galleries'],
            'nepali_title'       => ['nullable'],
            'main_photo'         => ['nullable','file','max:2048','mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'status'             => ['nullable'],
            'excerpt'            => ['nullable'],

        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'slug'      => Str::slug($this->title)
        ]);
    }
}
