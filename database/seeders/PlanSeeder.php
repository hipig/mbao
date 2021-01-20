<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\PlanFeature;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plan = Plan::create([
            'name' => '默认',
            'key' => Plan::DEFAULT_KEY,
            'price' => 0,
            'period' => -1,
            'interval' => Plan::INTERVAL_YEAR,
            'description' => '默认方案',
        ]);

        $plan->features()->create([
            'key' => 'block_ads',
            'value' => PlanFeature::STATUS_DISABLE
        ]);
    }
}
