<?php

namespace App\Http\Requests\Admin\RegistrationForm;

use App\Models\RegistrationForm;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreRegistrationFormValidation extends FormRequest
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
            'org_name'              => ['required','max:150','string','unique:registration_forms'],
            'org_phone'             => ['required', 'max:150'],
            'org_email'             => ['required', 'max:150'],
            'participant_name'      => ['required', 'max:150'],
            'participant_phone'     => ['required', 'max:150'],
            'participant_email'     => ['required', 'max:150'],
            'participant_post'      => ['required', 'max:150'],
            'participant_gender'    => ['required', 'max:150'],
            'participant_education' => ['required', 'max:150'],
            'name_on_badge'         => ['required', 'max:150'],
            't_shirt_size'          => ['required', 'max:150'],
            'association'           => ['required', 'max:150'],
            'main_photo'            => ['nullable','file', 'max:2048','mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'main_voucher'          => ['nullable','file', 'max:2048','mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'status'                => ['nullable'],
        ];
    }
    public function prepareForValidation()
    {
        $this->merge([
            'status' => $this->status ? 1 : 0,
        ]);
    }
}
