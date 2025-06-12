<?php

namespace App\Http\Requests\Admin\ContactForm;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class UpdateContactFormValidation extends FormRequest
{
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
        return [
            'name'              => ['required','max:150','string','unique:contact_forms,name,'.$this->id],
            'email'             => ['required'],
            'phone'              =>['required'],
            'subject'           => ['required'],
            'message'           => ['required'],
            'status'            => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
