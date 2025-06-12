<?php

namespace App\Http\Requests\Admin\Career;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateCareerValidation extends FormRequest
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
            'title'              => ['required', 'max:150', 'string', 'unique:careers,title,' . $this->id],
            'job_cat'            => ['required'],
            'job_post'           => ['required'],
            'deadline'           => ['required'],
            'job_type'            => ['required'],
            'experience'            => ['required'],
            'skill'            => ['required'],
            'location'           => ['required'],
            'slug'               => ['required', 'max:150'],
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
