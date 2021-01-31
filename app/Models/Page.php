<?php

namespace App\Models;

use App\Models\Traits\StatusScope;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory, Filterable, StatusScope;

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
