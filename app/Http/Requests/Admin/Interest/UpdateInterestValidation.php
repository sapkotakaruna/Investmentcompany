<?php

namespace App\Http\Requests\Admin\Interest;

use App\Traits\CustomValidationTrait;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateInterestValidation extends FormRequest
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
            'title'                => ['required', 'max:255', 'string'],
            'status'                => ['nullable',  'boolean'],


        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
