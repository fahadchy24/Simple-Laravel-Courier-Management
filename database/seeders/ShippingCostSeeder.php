<?php

namespace Database\Seeders;

use App\Models\ShippingCost;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShippingCostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ShippingCost::updateOrCreate([
            'rule_name' => 'Alpha-1',
            'delivery_route' => 1,
            'delivery_type' => 1,
            'weight' => 1,
            'expiry_date' => date('2022-02-28'),
            'cost' => 100
        ]);
        ShippingCost::updateOrCreate([
            'rule_name' => 'Alpha-2',
            'delivery_route' => 1,
            'delivery_type' => 1,
            'weight' => 2,
            'expiry_date' => date('2022-02-28'),
            'cost' => 120
        ]);
        ShippingCost::updateOrCreate([
            'rule_name' => 'Alpha-3',
            'delivery_route' => 1,
            'delivery_type' => 1,
            'weight' => 3,
            'expiry_date' => date('2022-02-28'),
            'cost' => 130
        ]);
        ShippingCost::updateOrCreate([
            'rule_name' => 'Alpha-4',
            'delivery_route' => 2,
            'delivery_type' => 1,
            'weight' => 1,
            'expiry_date' => date('2022-02-28'),
            'cost' => 110
        ]);
        ShippingCost::updateOrCreate([
            'rule_name' => 'Alpha-5',
            'delivery_route' => 2,
            'delivery_type' => 1,
            'weight' => 2,
            'expiry_date' => date('2022-02-28'),
            'cost' => 125
        ]);
        ShippingCost::updateOrCreate([
            'rule_name' => 'Alpha-6',
            'delivery_route' => 2,
            'delivery_type' => 1,
            'weight' => 3,
            'expiry_date' => date('2022-02-28'),
            'cost' => 135
        ]);
    }
}
