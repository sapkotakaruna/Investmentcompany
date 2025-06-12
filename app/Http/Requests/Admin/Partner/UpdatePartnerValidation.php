<?php

namespace App\Http\Requests\Admin\Partner;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdatePartnerValidation extends FormRequest
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
            'title'               => ['required','max:150','string','unique:partners,title,'.$this->id],
            'slug'                => ['required', 'max:150'],
            'url'                 => ['required', 'max:150'],
            'type'                 =>['nullable' ],
            'main_photo'          => ['nullable','file', 'max:2048','mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'excerpt'             => ['nullable'],
            'status'              => ['boolean'],

        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->title),
            'status' => $this->status ? 1 : 0,
            'type' => $this->type ? 1 : 0,
        ]);
    }
}
