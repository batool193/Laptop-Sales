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
        'price' => 'unsignedDecimal',
    ];
    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }
}
