<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'title',
        'job_cat',
        'job_post',
        'location',
        'deadline',
        'job_type',
        'experience',
        'skill',
        'excerpt',
        'slug',
        'rank',
        'photo',
        'status',
    ];
    public function image_path()
    {
        return asset('images/career/' . $this->photo);
    }
    public function image_path_withAsset()
    {
        return asset('images/career/' .  $this->photo);
    }
}
