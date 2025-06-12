<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SiteSetting extends Model
{
    use HasFactory;

    protected  $fillable = [
        'title',
        'slogan',
        'location',
        'email',
        'logo',
        'phone',
        //  Customer Care
        'customer_care_email',
        'customer_care_phone',
        'customer_care_excerpt',

        'facebook_link',
        'twitter_link',
        'viber_link',
        'instagram_link',

        'opening_time',

        'footer_menu_first_title',
        'footer_menu_second_title',
        'footer_menu_third_title',
        'footer_menu_fourth_title',
        'footer_menu_five_title',
        'footer_menu_six_title',
        'footer_menu_seven_title',
        'footer_menu_eight_title',

        'footer_menu_first_link',
        'footer_menu_second_link',
        'footer_menu_third_link',
        'footer_menu_fourth_link',
        'footer_menu_five_link',
        'footer_menu_six_link',
        'footer_menu_seven_link',
        'footer_menu_eight_link',


        //    stat
<<<<<<< HEAD

=======
        'stat_title',
>>>>>>> 860413d814efe3690716e72edc4ee89a82400cce
        'view_count',
    ];
    public function logo()
    {
        return asset('/images/siteSetting/' . $this->logo);
    }

<<<<<<< HEAD

=======
    public function statisticsCat(): BelongsTo
    {
        return $this->belongsTo(StatCat::class, 'stat_title', 'id')->where('status', 1);
    }
    public function interest(): HasMany
    {
        return $this->hasMany(Interest::class);
    }
>>>>>>> 860413d814efe3690716e72edc4ee89a82400cce
    public function hour(): HasMany
    {
        return $this->hasMany(Hour::class);
    }
<<<<<<< HEAD
=======

    
>>>>>>> 860413d814efe3690716e72edc4ee89a82400cce
}
