<?php

namespace App\Http\Requests\Admin\ContactForm;

use App\Models\ContactForm;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreContactFormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    //    public function authorize()
    //    {
    //        return true;
    //    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'    => ['required', 'max:150', 'string'],
            'email'   => ['required', 'max:150', 'email', function ($attribute, $value, $fail) {
                if ($this->isTempEmail($value)) {
                    $fail('Temporary or fake email addresses are not allowed.');
                }
            }],
            'phone'   => ['required'],
            'subject' => ['required', 'max:150'],
            'message' => ['required', 'max:150'],
            'status'  => ['nullable'],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'status' => $this->status ? 1 : 0,
        ]);
    }
    protected function isTempEmail($email)
    {
        $temporaryDomains = [
            'mailinator.com',
            '10minutemail.com',
            'tempmail.com',
            'guerrillamail.com',
            'yopmail.com',
            'discard.email',
            'trashmail.com',
            'fakeinbox.com',
            // Add more as needed
        ];

        $domain = strtolower(substr(strrchr($email, "@"), 1));
        return in_array($domain, $temporaryDomains);
    }
}
