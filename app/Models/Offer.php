<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{

    use HasFactory;
    protected $fillable = [
        'laptop_id',
        'offer_description',
        'discount_percentage',
        'start_date',
        'end_date'
    ];
     /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'discount_percentage' => 'decimal:2',
        'start_date' => 'datetime',
        'end_date' => 'datetime',    ];
    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }
}
