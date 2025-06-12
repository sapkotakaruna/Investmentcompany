<?php

namespace App\Http\Requests\Admin\ServiceCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateServiceCategoryValidation extends FormRequest
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
            'name'               => ['required', 'max:150', 'string', 'unique:service_categories,name,' . $this->id],
            'nepali_name'         => ['nullable', 'max:150'],
            'excerpt'             => ['nullable'],
            'slug'                => ['required', 'max:150'],
            'main_photo'          => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'status'              => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
