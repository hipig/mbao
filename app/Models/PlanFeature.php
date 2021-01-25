<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use HasFactory;

    const FEATURE_UNLOCK_CARD = 'unlock_card';
    const FEATURE_BLOCK_ADS = 'block_ads';
    public static $featureMap = [
        self::FEATURE_UNLOCK_CARD => [
            'label' => '解锁卡片',
            'type' => 'select',
        ],
        self::FEATURE_BLOCK_ADS => [
            'label' => '屏蔽广告',
            'type' => 'select',
        ],
    ];

    const STATUS_ENABLE = 'yes';
    const STATUS_DISABLE = 'no';
    public static $statusMap = [
        self::STATUS_ENABLE => '启用',
        self::STATUS_DISABLE => '禁用',
    ];

    protected $fillable = [
        'plan_id',
        'name',
        'key',
        'value',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function getTypeAttribute()
    {
        return self::$featureMap[$this->getAttribute('key')]['type'] ?? 'input';
    }

    public function getLabelAttribute()
    {
        return self::$featureMap[$this->getAttribute('key')]['label'] ?? '未知功能';
    }
}
