<?php

namespace App\Http\Requests\Admin\SiteSetting;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSiteSettingValidation extends FormRequest
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
            'title'                     => ['required', 'max:150', 'string', 'unique:site_settings,title,' . $this->id],
            'slogan'                    => ['required', 'string'],
            'location'                  => ['required', 'string'],
            'email'                     => ['required', 'email'],
            'main_logo'                 => ['nullable', 'file', 'max:2048', 'mimes:jpg,jpeg,png,bmp,tiff,gif'],
            'phone'                     => ['required', 'string'],
            'customer_care_email'       => ['nullable', 'string'],
            'customer_care_phone'       => ['nullable', 'string'],
            'customer_care_excerpt'     => ['nullable', 'string'],
            'facebook_link'             => ['required', 'string'],
            'twitter_link'              => ['required', 'string'],
            'viber_link'                => ['nullable', 'string'],
            'instagram_link'            => ['nullable', 'string'],
            'opening_time'              => ['required', 'string'],
            'footer_menu_first_title'   => ['nullable', 'string'],
            'footer_menu_second_title'  => ['nullable', 'string'],
            'footer_menu_third_title'   => ['nullable', 'string'],
            'footer_menu_fourth_title'  => ['nullable', 'string'],
            'footer_menu_five_title'    => ['nullable', 'string'],
            'footer_menu_six_title'     => ['nullable', 'string'],
            'footer_menu_seven_title'   => ['nullable', 'string'],
            'footer_menu_eight_title'   => ['nullable', 'string'],
            'footer_menu_first_link'    => ['nullable', 'string'],
            'footer_menu_second_link'   => ['nullable', 'string'],
            'footer_menu_third_link'    => ['nullable', 'string'],
            'footer_menu_fourth_link'   => ['nullable', 'string'],
            'footer_menu_five_link'     => ['nullable', 'string'],
            'footer_menu_six_link'      => ['nullable', 'string'],
            'footer_menu_seven_link'    => ['nullable', 'string'],
            'footer_menu_eight_link'    => ['nullable', 'string'],



            'stat_title'                => ['nullable', 'string'],
        ];
    }
}
