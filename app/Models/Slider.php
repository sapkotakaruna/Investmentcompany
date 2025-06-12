<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Slider extends BaseModel
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        // 'nepali_title',
        'slug',
        'url',
        'rank',
        'photo',
        'excerpt',
        'status',
        'image_mode',
        'caption_position',
    ];
    public function image_path()
    {
        return asset('images/slider/' . $this->photo);
    }
    public function image_path_withAsset()
    {
        return asset('images/slider/' . $this->photo);
    }
}
