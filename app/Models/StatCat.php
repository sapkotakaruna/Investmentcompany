<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StatCat extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        "title",
        "slug",
        "rank",
        "status",
    ];
    public function statistics(): HasMany
    {
        return $this->hasMany(StatisticsDetail::class, "category_id", "id")->orderBy('rank', 'asc');
    }
}
