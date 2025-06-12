<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventForm extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     * @property string $name The name of the event.
     * @property string $nepali_name The Nepali name of the event.
     * @property string $organization_name The name of the organizing entity.
     * @property string $nepali_organization_name The Nepali name of the organizing entity.
     */
    protected $fillable = [
        'event_id',
        'name',
        'nepali_name',
        'designation',
        'organization_name',
        'nepali_organization_name',
        'district',
        'municipality',
        'ward',
        'street',
        'telephone_no',
        'phone_no',
        'qualification',
        'email',
        'voucher_photo',
        'voucher_status',
        'status'
    ];

    /**
     * Get the event that owns the event form.
     */
    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
