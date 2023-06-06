<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $plans = [
            [
                'name' => 'Govisa-Plus', 
                'slug' => 'govisa-plus', 
                'stripe_plan' => 'price_1MhntJHkFfyZIkh0y3uTULDI', 
                'price' => 29.00, 
                'description' => 'month'
            ],
            [
                'name' => 'Sponsorships', 
                'slug' => 'sponsorships', 
                'stripe_plan' => 'price_1MhnxMHkFfyZIkh0tXW19AOE', 
                'price' => 49.00, 
                'description' => 'month'
            ],
            [
                'name' => 'Featured-Listing', 
                'slug' => 'featured-listing', 
                'stripe_plan' => 'price_1MhnydHkFfyZIkh0VKh1e0rn', 
                'price' => 99.00, 
                'description' => 'month'
            ]
        ];
  
        foreach ($plans as $plan) {
            Plan::create($plan);
        }
    }
}
