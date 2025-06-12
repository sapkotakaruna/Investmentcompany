<?php

namespace App\Http\Requests\Admin\Service;

use App\Models\Member;
use App\Models\Service;
use App\Traits\CustomValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreServiceValidation extends FormRequest
{
    use CustomValidationTrait;
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
            'name'                => ['required', 'max:150', 'string', 'unique:services'],
            // 'nepali_name'         => ['required', 'max:150'],
            'excerpt'             => ['required'],
            'slug'                => ['required', 'max:150'],
            'rank'                => ['required', 'numeric', 'gt:0'],
            'isnew'               => ['nullable'],
            'isfeatured'          => ['nullable'],
            'main_photo'          => ['required_if:isnew,1', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'status'              => ['nullable'],
            'service_category_id' => ['required', 'string', 'service_category_id_validation'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug'    => Str::random(6),
            'rank'      => Service::max('rank') + 1,
            'status'    => $this->status ? 1 : 0,
            'isnew' => $this->isnew ? 1 : 0,
            'isfeatured' => $this->isfeatured ? 1 : 0,

        ]);
    }
    public function messages()
    {
        return [
            'main_photo.required_if' => 'The main photo is required when the "Is New" field is active.',
        ];
    }
}
