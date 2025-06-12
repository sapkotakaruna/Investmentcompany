<?php

namespace App\Http\Requests\Admin\Service;

use App\Traits\CustomValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateServiceValidation extends FormRequest
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
            'name'                => ['required', 'max:150', 'string', 'unique:services,name,' . $this->id],
            // 'nepali_name'        => ['required', 'max:150'],
            'excerpt'             => ['required'],
            'slug'                => ['required', 'max:150'],
            'isnew'                =>['nullable'],
            'isfeatured'           =>['nullable'],
            'main_photo'          => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'status'              => ['nullable'],
            'service_category_id'  => ['required', 'string', 'service_category_id_validation'],

        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->name),
            'status' => $this->status ? 1 : 0,
            'isnew' => $this->isnew ? 1 : 0,
            'isfeatured' => $this->isfeatured ? 1 : 0,
        ]);
    }
}
