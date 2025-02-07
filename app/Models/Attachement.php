<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachement extends Model
{
    use HasFactory;
    protected $fillable = [
        'laptop_id',
        'file_name',
        'file_path'
    ];

    public function laptop()
    {
        return $this->belongsTo(Laptop::class);
    }
}
