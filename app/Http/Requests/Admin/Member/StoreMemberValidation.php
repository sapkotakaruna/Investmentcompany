<?php

namespace App\Http\Requests\Admin\Member;

use App\Models\Member;
use App\Traits\CustomValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreMemberValidation extends FormRequest
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
            'name'                => ['required', 'max:150', 'string'],
            'email'               => ['nullable', 'max:150'],
            'post'                => ['nullable', 'max:150'],
            'phone'               => ['nullable', 'max:150'],
            'excerpt'             => ['nullable'],
            'slug'                => ['required', 'max:150'],
            'rank'                => ['required', 'numeric', 'gt:0'],
            'row'                => ['required', 'numeric', 'gt:0'],
            'main_photo'          => ['required', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'isinfo'              => ['nullable'],
            'status'              => ['nullable'],
            'member_category_id'  => ['required', 'string', 'member_category_id_validation'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug'      => Str::slug($this->name),
            // 'rank'      => Member::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
            //  'isinfo' => $this->isinfo ? 1 : 0,
        ]);
    }
}
