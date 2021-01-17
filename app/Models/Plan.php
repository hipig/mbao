<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'key',
        'price',
        'period',
        'interval',
        'description',
        'status',
        'index',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
