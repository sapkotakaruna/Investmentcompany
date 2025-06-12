<?php

namespace App\Traits;

use App\Models\IntrestCategory;
use App\Models\MemberCategory;
use App\Models\ServiceCategory;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

trait CustomValidationTrait
{

    public function customValidation()
    {
        $this->foreignIdValidation('user_id_validation', User::class);
        $this->foreignIdValidation('service_category_id_validation', ServiceCategory::class);
        $this->foreignIdValidation('member_category_id_validation', MemberCategory::class);
        $this->foreignIdValidation('interest_category_id_validation', IntrestCategory::class);
    }
    protected function foreignIdValidation($key, $model): void
    {
        Validator::extend($key, function ($attribute, $value, $parameter, $validator) use ($model) {
            if ($model::find($value))
                return true;
            return false;
        });
    }
    public function messages()
    {
        return [
            'user_id.user_id_validation'                                => 'Please select valid user',
            'service_category_id.service_category_id_validation'        => 'Please select valid Service category',
            'member_category_id.member_category_id_validation'          => 'Please select valid Member Category',
            'interest_category_id.interest_category_id_validation'      => 'Please select valid Intrest Category',
        ];
    }
}
