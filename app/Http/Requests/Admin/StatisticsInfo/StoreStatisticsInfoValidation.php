<?php

namespace App\Http\Requests\Admin\StatisticsInfo;

use App\Models\StatCat;
use App\Models\StatisticsInfo;
use App\Traits\CustomValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreStatisticsInfoValidation extends FormRequest
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
            'title'                => ['required', 'max:150', 'string', 'unique:stat_cats,title'],
            'slug'                 => ['nullable'],
            'rank'                 => ['required', 'numeric', 'gt:0'],
            'status'               => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'slug'      => Str::slug($this->title),
            'rank'      => StatCat::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
