<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    /**
     * 周期
     */
    const INTERVAL_DAY = 'day';
    const INTERVAL_MONTH = 'month';
    const INTERVAL_YEAR = 'year';

    public static $intervalMap = [
        self::INTERVAL_DAY => '天',
        self::INTERVAL_MONTH => '月',
        self::INTERVAL_YEAR => '年',
    ];

    /**
     * 默认方案标识
     */
    const DEFAULT_KEY = 'default';

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
        'price' => 'float',
        'status' => 'boolean',
    ];

    public function features()
    {
        return $this->hasMany(PlanFeature::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }

    public function getIsDefaultAttribute()
    {
        return $this->getAttribute('key') === self::DEFAULT_KEY;
    }
}
