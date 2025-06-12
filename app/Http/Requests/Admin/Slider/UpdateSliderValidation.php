<?php

namespace App\Http\Requests\Admin\Slider;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateSliderValidation extends FormRequest
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
            'title'              => ['nullable', 'max:150', 'string'],
            // 'nepali_title'       => ['nullable'],
            'image_mode'         => ['required'],
            'caption_position'  => ['required'],
            'url'                 => ['nullable', 'max:150'],
            'slug'                => ['nullable', 'max:150'],
            'main_photo'         => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'status'             => ['nullable'],
            'excerpt'            => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
