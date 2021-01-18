<?php

use Carbon\Carbon;

/**
 * 计算周期
 * @param string $interval 周期
 * @param int $period 时长
 * @param null $start 开始时间
 * @author zhujiapeng
 * @date 2021/1/18
 */
function period($interval = 'month', $period = 1, $start = null)
{
    $end = null;

    if (empty($start)) {
        $start = Carbon::now();
    } elseif (! $start instanceof Carbon) {
        $start = new Carbon($start);
    }

    if ($period > 0) {
        $cloneStart = clone $start;
        $method = 'add'.ucfirst($interval).'s';
        $end = $cloneStart->{$method}($period);
    }

    return compact('start', 'end');
}
