<?php

namespace App\Http\Requests\Admin\InterestCategory;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Traits\CustomValidationTrait;


class UpdateInterestCategoryValidation extends FormRequest
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
            'title'                => ['required', 'max:150', 'string', 'unique:intrest_categories,title,' . $this->id],
            'effective_from'        => ['nullable',],
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
