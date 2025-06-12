<?php

namespace App\Http\Requests\Admin\InterestCategory;

use App\Models\IntrestCategory;
use App\Traits\CustomValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreInterestCategoryValidation extends FormRequest
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
            'title'                => ['required', 'max:150', 'string', 'unique:intrest_categories'],
            'effective_from'         => ['nullable', 'max:150'],
            'slug'                 => ['required', 'max:150'],
            'rank'                 => ['required', 'numeric', 'gt:0'],
            'status'               => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug'      => Str::slug($this->title),
            'rank'      => IntrestCategory::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
