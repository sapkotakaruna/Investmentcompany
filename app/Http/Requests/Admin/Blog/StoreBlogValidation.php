<?php

namespace App\Http\Requests\Admin\Blog;

use App\Models\Blog;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreBlogValidation extends FormRequest
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
            'title'               => ['required', 'max:150', 'string'],
            'type'                => ['required', 'max:150'],
            'upcoming'            => ['nullable'],
            'author'              => ['nullable', 'max:150'],
            'date'                => ['required', 'max:150'],
            'slug'                => ['required', 'max:150'],
            'rank'                => ['required', 'numeric', 'gt:0'],
            'excerpt'             => ['required'],
            'main_photo'          => ['required', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'status'              => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug'      => Str::slug($this->title),
            'rank'      => Blog::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
