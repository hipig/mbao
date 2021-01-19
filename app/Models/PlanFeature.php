<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanFeature extends Model
{
    use HasFactory;

    const FEATURE_BLOCK_ADS = 'block_ads';

    public static $featureMap = [
        self::FEATURE_BLOCK_ADS => '去除广告',
    ];

    const VALUE_ENABLE = 'yes';
    const VALUE_DISABLE = 'no';

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
}
