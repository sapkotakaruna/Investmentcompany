<?php

namespace App\Http\Requests\Admin\Member;

use App\Traits\CustomValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateMemberValidation extends FormRequest
{
    use  CustomValidationTrait;

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
        $this->customValidation();
        return [
            'name'                => ['required', 'max:150', 'string'],
            'email'        => ['nullable', 'max:150'],
            'post'                => ['nullable', 'max:150'],
            'phone'               => ['nullable', 'max:150'],
            'excerpt'             => ['nullable'],
            'slug'                => ['required', 'max:150'],
            'main_photo'          => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'status'              => ['nullable'],
            'rank'                => ['nullable', 'numeric', 'gt:0'],
            'row'                => ['required', 'numeric', 'gt:0'],
            'isinfo'              => ['nullable'],

        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
            //'isinfo' => $this->isinfo ? 1 : 0,
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
