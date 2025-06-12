<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'service_category_id',
        'name',
        // 'nepali_name',
        'excerpt',
        'slug',
        'photo',
        'rank',
        'isnew',
        'isfeatured',
        'status',
    ];

    public function serviceCategory()
    {
        return $this->belongsTo(ServiceCategory::class, 'service_category_id');
    }
    public function image_path()
    {
        return asset('images/service/' . $this->photo);
    }
    public function image_path_withAsset()
    {
        return asset('images/service/' . $this->photo);


    }

}
