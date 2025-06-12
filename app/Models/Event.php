<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'event_name',
        'event_date',
        'event_location',
        'payment', //['free', 'payable']
        'excerpt',
        'rank',
        'status',
    ];

    public function eventForms()
    {
        return $this->hasMany(EventForm::class);
    }
}
