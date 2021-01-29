<?php

namespace App\Models;

use Carbon\Carbon;
use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory, Filterable;

    const STATUS_ACTIVE = 'active';
    const STATUS_INACTIVE = 'inactive';
    const STATUS_EXPIRE = 'expire';
    public static $statusMap = [
        self::STATUS_ACTIVE => '生效中',
        self::STATUS_INACTIVE => '未生效',
        self::STATUS_EXPIRE => '已过期',
    ];

    protected $fillable = [
        'plan_id',
        'user_id',
        'started_at'
    ];

    protected $casts = [
        'started_at',
        'ended_at',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            if (!$model->ended_at) {
                list($start, $end) = period($model->plan->interval, $model->plan->period, $model->started_at);
                $model->started_at = $start;
                $model->ended_at = $end;
            }
        });
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function active()
    {
        return is_null($this->ended_at) || Carbon::now()->lte($this->ended_at);
    }

    public function expire()
    {
        return !$this->active();
    }

    public function inactive()
    {
        return Carbon::now()->gte($this->started_at);
    }

    public function getStatusAttribute()
    {
        if ($this->inactive())    $status = 'inactive';
        if ($this->active())    $status = 'active';
        if ($this->expire())    $status = 'expire';

        return $status;
    }

    public function getStatusTextAttribute()
    {
        return self::$statusMap[$this->status] ?? '未知';
    }
}
