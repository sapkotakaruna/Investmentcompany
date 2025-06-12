<?php

namespace App\Http\Requests\Admin\Career;

use App\Models\Career;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreCareerValidation extends FormRequest
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
            'title'               => ['required', 'max:150', 'string', 'unique:careers'],
            'job_cat'             => ['required', 'max:150'],
            'job_post'            => ['required', 'max:150'],
            'location'            => ['required', 'max:150'],
            'deadline'            => ['required', 'max:150'],
            'job_type'            => ['required', 'max:150'],
            'experience'            => ['required', 'max:150'],
            'skill'            => ['required', 'max:150'],
            'excerpt'             => ['nullable'],
            'slug'                => ['required', 'max:150'],
            'rank'                => ['required', 'numeric', 'gt:0'],
            'main_photo'          => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'status'              => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug'      => Str::slug($this->title),
            'rank'      => Career::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
