<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand',
        'serial_number',
        'processor',
        'ram',
        'storage',
        'color',
        'description',
        'price',
    ];

    public function offers()
    {
        return $this->hasMany(Offer::class);
    }
    public function attachements()
    {
        return $this->hasMany(Attachement::class);
    }
}
