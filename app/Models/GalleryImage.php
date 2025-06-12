<?php

namespace App\Models;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryImage extends BaseModel
{
    use HasFactory;

    protected $fillable=['gallery_id','image','rank','alt_text','caption','status'];

}
