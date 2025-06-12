<?php

namespace App\Http\Requests\Admin\MemberCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Traits\CustomValidationTrait;


class UpdateMemberCategoryValidation extends FormRequest
{
    use  CustomValidationTrait;

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
            'title'                => ['required', 'max:150', 'string', 'unique:member_categories,title,' . $this->id],
            'display_name'         => ['nullable', 'max:150', 'string', 'unique:member_categories,display_name,' . $this->id],
            'nepali_title'         => ['nullable', 'max:150'],
            'parent_id'            => ['nullable', 'string', 'member_category_id_validation'],
            'slug'                 => ['required', 'max:150'],
            'status'               => ['nullable'],
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
