<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notice extends BaseModel
{
    use HasFactory;
    protected  $fillable = [
        'title',
        // 'nepali_title',
        'start_date',
        'end_date',
        'slug',
        'excerpt',
        'rank',
        'photo',
        'is_popup',
        'displaystat',
        'status',
    ];
    public function image_path()
    {
        return asset('images/notice/' . $this->photo);
    }
    public function image_path_withAsset()
    {
        return asset('images/notice/' .  $this->photo);
    }
}
