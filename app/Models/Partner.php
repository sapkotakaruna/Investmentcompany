<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partner extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'url',
        'rank',
        'type',
        'photo',
        'status',
    ];
    public function scopeAssociate($query)
    {
        return $query->where('type', 1);
    }
    public function scopeClient($query)
    {
        return $query->where('type', 0);
    }
    public function image_path()
    {
        return asset('images/partner/' . $this->photo);
    }
    public function image_path_withAsset()
    {
        return asset('images/partner/' . $this->photo);
    }
}
