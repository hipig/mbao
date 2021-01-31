<?php

namespace App\ModelFilters\Admin;

use App\Models\Plan;
use Carbon\Carbon;
use EloquentFilter\ModelFilter;
use Illuminate\Database\Eloquent\Builder;

class SubscriptionFilter extends ModelFilter
{
    /**
    * Related Models that have ModelFilters as well as the method on the ModelFilter
    * As [relationMethod => [input_key1, input_key2]].
    *
    * @var array
    */
    public $relations = [];

    public function search($search)
    {
        return $this->where(function (Builder $query) use ($search) {
            $query->whereHas('plan', function (Builder $q) use ($search) {
                $q->where('name', 'like', '%' . $search . '%');
            })->orWhere(function (Builder $query) use ($search) {
                $query->whereHas('user', function (Builder $q) use ($search) {
                    $q->where('nickname', 'like', '%' . $search . '%');
                });
            });
        });
    }

    public function plan($plan)
    {
        return $this->whereHas('plan', function (Builder $query) use ($plan) {
            $query->where('plan_id', $plan);
        });
    }

    public function status($status)
    {
        $now = Carbon::now();

        switch ($status) {
            case 'active':
                $this->whereNull('ended_at')
                    ->orWhere(function (Builder $query) use ($now) {
                        $query->where('started_at', '<', $now)->where('ended_at', '>', $now);
                    });
                break;
            case 'inactive':
                $this->where('started_at', '>', $now);
                break;
            case 'expire':
                $this->where('ended_at', '<', $now);
                break;
        }
    }
}
