<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceCategory extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        // 'nepali_name',
        'excerpt',
        'slug',
        'rank',
        'photo',
        'status',
    ];
    public function services()
    {
        return $this->hasMany(Service::class, 'service_category_id')->where('status', 1)->orderBy('rank');
    }
    public function image_path()
    {
        return asset('images/serviceCategory/' . $this->photo);
    }
    public function image_path_withAsset()
    {
        return asset('images/serviceCategory/' . $this->photo);
    }
}
