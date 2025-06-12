<?php

namespace App\Http\Requests\Admin\Notice;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateNoticeValidation extends FormRequest
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
            'title'              => ['required', 'max:150', 'string', 'unique:notices,title,' . $this->id],
            // 'nepali_title'        => ['required', 'max:150'],
            'start_date'          => ['required', 'max:150'],
            'end_date'            => ['required', 'max:150'],
            'slug'                => ['required', 'max:150'],
            'excerpt'             => ['required'],
            'main_photo'          => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'is_popup'            => ['nullable'],
            'displaystat'         => ['nullable'],
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
