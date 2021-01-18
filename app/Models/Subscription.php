<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;

    protected $casts = [
        'started_at',
        'ended_at',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function active()
    {
        return is_null($this->ended_at) || Carbon::now()->lte($this->ended_at);
    }

    public function inactive()
    {
        return !$this->active();
    }
}
