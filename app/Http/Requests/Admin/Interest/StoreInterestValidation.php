<?php

namespace App\Http\Requests\Admin\Interest;

use App\Models\Interest;
use App\Models\InterestParent;
use App\Traits\CustomValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreInterestValidation extends FormRequest
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
            'title'                => ['required', 'max:255', 'string'],
            'rank'                => ['required',  'integer'],
            'status'                => ['nullable',  'boolean'],
            'interest_category_id'  => ['required', 'string', 'interest_category_id_validation'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'rank'      => InterestParent::max('rank') + 1,
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
