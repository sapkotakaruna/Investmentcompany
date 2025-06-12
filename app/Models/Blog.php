<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'title',
        'nepali_title',
        'author',
        'date',
        'slug',
        'excerpt',
        'type',
        'rank',
        'photo',
        'upcoming',
        'status',
    ];
    public function image_path()
    {
        return asset('images/blog/' . $this->photo);
    }
    public function image_path_withAsset()
    {
        return asset('images/blog/' . $this->photo);
    }
}
