<?php

namespace App\Http\Requests\Admin\Partner;

use App\Models\AboutUs;
use App\Models\Partner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StorePartnerValidation extends FormRequest
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
            'title'               => ['required', 'max:150', 'string', 'unique:partners'],
            'slug'                => ['required', 'max:150'],
            'url'                 => ['nullable', 'max:150'],
            'rank'                => ['required', 'numeric', 'gt:0'],
            'type'                 =>['nullable' ],
            'main_photo'          => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'excerpt'             => ['nullable'],
            'status'              => ['boolean'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug'      => Str::slug($this->title),
            'rank'      => Partner::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
            'type' => $this->type ? 1 : 0,
        ]);
    }
}
