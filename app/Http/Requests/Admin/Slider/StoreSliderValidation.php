<?php

namespace App\Http\Requests\Admin\Slider;

use App\Models\Slider;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreSliderValidation extends FormRequest
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
            'title'               => ['nullable', 'max:150', 'string'],
            'nepali_title'        => ['nullable', 'max:150'],
            'image_mode'         => ['required'],
            'caption_position'  => ['required'],
            'url'                 => ['nullable', 'max:150'],
            'slug'                => ['nullable', 'max:150'],
            'rank'                => ['required', 'numeric', 'gt:0'],
            'main_photo'          => ['required', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'status'              => ['nullable'],
            'excerpt'             => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug'      => Str::slug($this->title),
            'rank'      => Slider::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
