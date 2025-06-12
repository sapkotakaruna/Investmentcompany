<?php

namespace App\Http\Requests\Admin\MemberCategory;

use App\Models\MemberCategory;
use App\Traits\CustomValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreMemberCategoryValidation extends FormRequest
{
    use  CustomValidationTrait;
    /**
     *
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
            'title'                => ['required', 'max:150', 'string', 'unique:member_categories'],
            'display_name'         => ['nullable', 'max:150', 'string', 'unique:member_categories'],
            'nepali_title'         => ['nullable', 'max:150'],
            'parent_id'            => ['nullable', 'string', 'member_category_id_validation'],
            'slug'                 => ['required', 'max:150'],
            'rank'                 => ['required', 'numeric', 'gt:0'],
            'status'               => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug'      => Str::slug($this->title),
            'rank'      => MemberCategory::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
