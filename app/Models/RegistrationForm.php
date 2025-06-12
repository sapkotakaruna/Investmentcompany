<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrationForm extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'org_name',
        'org_phone',
        'org_email',
        'participant_name',
        'participant_phone',
        'participant_email',
        'participant_post',
        'participant_gender',
        'participant_education',
        'name_on_badge',
        't_shirt_size',
        'association',
        'photo',
        'voucher',
        'status',
    ];
}
