<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InterestParent extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'interest_category_id',
        'title',
        'status',
        'rank',
    ];
    public function interest(): HasMany
    {
        return $this->hasMany(Interest::class, 'parent_id', 'id');
    }
}
