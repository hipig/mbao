<?php

namespace App\Models;

use App\Models\Traits\CoverAttribute;
use App\Models\Traits\StatusScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardGroup extends Model
{
    use HasFactory, StatusScope, CoverAttribute;

    const COLOR_RED = 'red';
    const COLOR_YELLOW = 'yellow';
    const COLOR_GREEN = 'green';
    const COLOR_BLUE = 'blue';
    const COLOR_INDIGO = 'indigo';
    const COLOR_PURPLE = 'purple';
    const COLOR_PINK = 'pink';
    public static $colorMap = [
        self::COLOR_RED,
        self::COLOR_YELLOW,
        self::COLOR_GREEN,
        self::COLOR_BLUE,
        self::COLOR_INDIGO,
        self::COLOR_PURPLE,
        self::COLOR_PINK,
    ];

    protected $fillable = [
        'name',
        'name_en',
        'color',
        'cover',
        'is_pro',
        'status',
        'index',
    ];

    protected $casts = [
        'is_pro' => 'boolean',
        'status' => 'boolean',
    ];

    public function cards()
    {
        return $this->hasMany(Card::class, 'group_id');
    }
}
