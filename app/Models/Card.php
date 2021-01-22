<?php

namespace App\Models;

use App\Models\Traits\StatusScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory, StatusScope;

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
        'group_id',
        'name',
        'name_en',
        'spell_cn',
        'spell_en',
        'spell_uk',
        'color',
        'cover',
        'status',
        'index',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function group()
    {
        return $this->belongsTo(CardGroup::class, 'group_id');
    }
}
