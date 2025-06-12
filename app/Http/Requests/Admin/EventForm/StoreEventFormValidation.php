<?php

namespace App\Http\Requests\Admin\EventForm;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventFormValidation extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        
        return [
            'event_id' => 'required|exists:events,id',
            'name' => 'required|string|max:255',
            'nepali_name' => 'required|string|max:255',
            'designation' => 'required|string|max:255',
            'organization_name' => 'required|string|max:255',
            'nepali_organization_name' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'municipality' => 'required|string|max:255',
            'ward' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'telephone_no' => 'nullable|string|max:255',
            'phone_no' => 'required|string|max:255',
            'qualification' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'main_photo' => 'file|max:2048|mimes:jpg,jpeg,png,bmp,tiff,gif',
            'voucher_status' => 'boolean',
            'status' => 'boolean',
        ];
    }
}
