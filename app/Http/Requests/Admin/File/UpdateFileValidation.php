<?php

namespace App\Http\Requests\Admin\File;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateFileValidation extends FormRequest
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
            'title'               => ['required', 'max:150', 'string', 'unique:files,title,' . $this->id],
            'nepali_title'        => ['required', 'max:150'],
            'slug'                => ['required', 'max:150'],
            'file_type'           => ['required', 'max:150'],
            'main_file'           => ['nullable', 'file', 'max:6000', 'mimes:jpg,jpeg,png,bmp,tiff,gif,pdf,docx,doc,xls,xlsx,ppt,pptx,mp3'],
            'link'                => ['nullable'],
            'excerpt'             => ['nullable'],
            'status'              => ['nullable'],
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
