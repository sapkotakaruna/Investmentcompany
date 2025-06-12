<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'member_category_id',
        'name',
        'name',
        'email',
        'post',
        'phone',
        'excerpt',
        'slug',
        'rank',
        'photo',
        'isinfo',
        'status',
        'row',
    ];
    protected $appends = ['member_cat_slug', 'member_category_name', 'image_path'];

    public function scopeInfo($query)
    {
        return $query->where('isinfo', 1);
    }
    public function memberCategory()
    {
        return $this->belongsTo(MemberCategory::class, 'member_category_id');
    }
    public function getMemberCategoryNameAttribute()
    {

        $memberCategory = MemberCategory::findOrFail($this->member_category_id);

        return $memberCategory->title;
    }
    public function getMemberCatSlugAttribute()
    {

        $memberCategory = MemberCategory::findOrFail($this->member_category_id);

        return $memberCategory->title;
    }
    public function getImagePathAttribute()
    {
        return asset('/images/member/' . $this->photo);
    }
    public function getImagePathWithAssetAttribute()
    {
        return asset('images/member/' . $this->photo);
    }
    public function image_path()
    {
        return asset('/images/member/' . $this->photo);
    }
    public function image_path_withAsset()
    {
        return asset('images/member/' . $this->photo);
    }
}
