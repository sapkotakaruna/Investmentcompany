<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUs extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'nepali_title',
        'email',
        'excerpt',
        'slug',
        'rank',
        'status',
        'isbranch',
        'map_link',
    ];
    public function scopeBranch($query)
    {
        return $query->where('isbranch', 1);
    }
    public function scopeAbout($query)
    {
        return $query->where('isbranch', 0);
    }
}
