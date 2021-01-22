<?php

namespace App\Models;

use App\Models\Traits\StatusScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, StatusScope;

    protected $fillable = [
        'name',
        'key',
        'content',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];
}
