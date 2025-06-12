<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberCategory extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'title',
        'display_name',
        'nepali_title',
        'slug',
        'row',
        'rank',
        'parent_id',
        'status',
    ];


    public function parent()
    {
        return $this->belongsTo(MemberCategory::class, 'parent_id');
    }
    public function children()
    {
        return $this->hasMany(MemberCategory::class, 'parent_id');
    }
    public function members()
    {
        return $this->hasMany(Member::class, 'member_category_id', 'id')->orderBy('rank', 'asc');
    }
}
