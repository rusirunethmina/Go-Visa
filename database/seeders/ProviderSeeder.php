<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Services\Shared\Format\FormatService;

class ProviderSeeder extends Seeder
{
    protected $faker;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(FormatService $formatService){

        $this->faker = Faker::create();
        
        $users = [
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'consultant',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'consultant',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'consultant',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'consultant',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'consultant',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'consultant',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'consultant',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'consultant',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'consultant',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'consultant',
                'role' => 'provider',
                'status' => 'active'
            ],

            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'lawyer',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'lawyer',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'lawyer',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'lawyer',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'lawyer',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'lawyer',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'lawyer',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'lawyer',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'lawyer',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'lawyer',
                'role' => 'provider',
                'status' => 'active'
            ],


            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'private',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'private',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'private',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'private',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'private',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'private',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'private',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'private',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'private',
                'role' => 'provider',
                'status' => 'active'
            ],
            [
                'name' => $this->faker->name(),
                'email' =>  $this->faker->email(),
                'slug'  => Str::slug($this->faker->name()),
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'remember_token' => Str::random(10),
                'category' => 'private',
                'role' => 'provider',
                'status' => 'active'
            ],

        ];


        foreach ($users as $user) {
            $created = User::create($user);

            $avatar = $this->faker->randomElement([
                asset('frontend/images/mock/item-1.jpg'),
                asset('frontend/images/mock/item-2.jpg'),
                asset('frontend/images/mock/item-3.jpg'),
                asset('frontend/images/mock/item-4.jpg'),
                asset('frontend/images/mock/item-5.jpg'),
                asset('frontend/images/mock/item-6.jpg'),
                asset('frontend/images/mock/item-7.jpg'),
                asset('frontend/images/mock/item-8.jpg'),
                asset('frontend/images/mock/item-9.jpg'),
                asset('frontend/images/mock/item-10.jpg'),
            ]);

            $hire_thumbnail = $formatService->getYoutubeThumbnail('https://youtube.com/embed/bSwQeARyEKM');

            $created->profile->forceFill([
                'first_name' => $this->faker->firstName(),
                'last_name' => $this->faker->lastName(),
                'avatar' => $avatar,
                'phone' => $this->faker->e164PhoneNumber(),
                'hire_thumbnail' => $hire_thumbnail,
                'bio' =>  $this->faker->realText(450),
                'sub_bio' => $this->faker->realText(100),
                'company' => $this->faker->company(),
                'position' => $this->faker->jobTitle(),
                'why_should_you_hire_me' => 'https://youtube.com/embed/bSwQeARyEKM',
                'years_in_business' => $this->faker->randomDigit(),
                'tagline' => $this->faker->realText(100),
                'location_id' => Location::inRandomOrder()->first()->id
            ])->save();

            $created->testimonials()->create(
                [
                    'link' => 'https://www.youtube.com/embed/ys6td0Wrx1w',
                    'thumbnail' => $formatService->getYoutubeThumbnail('https://www.youtube.com/embed/ys6td0Wrx1w')
                ],
            )->save();

            $created->testimonials()->create(
                [
                    'link' => 'https://www.youtube.com/embed/u4IHqAKsbrA',
                    'thumbnail' => $formatService->getYoutubeThumbnail('https://www.youtube.com/embed/u4IHqAKsbrA')
                ]
            )->save();

            $created->testimonials()->create(
                [
                    'link' => 'https://www.youtube.com/embed/6M5QsH22U8I',
                    'thumbnail' => $formatService->getYoutubeThumbnail('https://www.youtube.com/embed/6M5QsH22U8I')
                ]
            )->save();
        }
    }
}
