<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Gallery extends BaseModel
{
    use HasFactory;

    protected $fillable = ['title', 'nepali_title', 'slug', 'status', 'excerpt', 'cover_photo'];

    public function images(): HasMany
    {
        return $this->hasMany(GalleryImage::class);
    }

    public function getImage()
    {
        return asset('images/gallery/' . $this->cover_photo);
    }
}
