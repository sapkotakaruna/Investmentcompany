<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'photo',
        'name',
        'type',
        'post',
        'excerpt',
        'slug',
        'rank',
        'status',
    ];
    public function scopeTestimonial($query)
    {
        return $query->where('type', 'testimonial');
    }
    public function scopeMessage($query)
    {
        return $query->where('type', 'message');
    }
    public function image_path()
    {
        return asset('images/testimonial/' . $this->photo);
    }
    public function image_path_withAsset()
    {
        return asset('images/testimonial/' . $this->photo);
    }
}
