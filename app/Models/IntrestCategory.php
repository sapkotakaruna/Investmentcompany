<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class IntrestCategory extends BaseModel
{
    use HasFactory;
    protected $fillable = [
        'title',
        'effective_from',
        'slug',
        'status',
        'rank'
    ];
    public function parent(): HasMany
    {
        return $this->hasMany(InterestParent::class, 'interest_category_id', 'id');
    }
}
