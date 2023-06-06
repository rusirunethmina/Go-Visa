<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan_Items;

class PlanItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans_items = [
            [
                'plans_id' => 1, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 1, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 1, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 1, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 1, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 2, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 2, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 2, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 2, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 3, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 3, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 3, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ],
            [
                'plans_id' => 3, 
                'name' => 'Unlimited account, listing and review support to optimize your presence',
            ]
        ];
  
        foreach ($plans_items as $item) {
            Plan_Items::create($item);
        }
    }
}
