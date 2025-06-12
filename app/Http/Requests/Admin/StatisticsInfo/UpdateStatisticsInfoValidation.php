<?php

namespace App\Http\Requests\Admin\StatisticsInfo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use App\Traits\CustomValidationTrait;


class UpdateStatisticsInfoValidation extends FormRequest
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
            'title'                => ['required', 'max:150', 'string', 'unique:stat_cats,title,' . $this->id],
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
