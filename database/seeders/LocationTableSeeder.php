<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class LocationTableSeeder extends Seeder
{
    protected $faker;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->faker = Faker::create();

        $locations = array(
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city()),
            array('name' => $this->faker->city())
        );

        foreach ($locations as $location) {
            Location::create([
                'name' => $location['name'],
            ]);
        }
    }
}
