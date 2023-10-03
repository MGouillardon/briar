<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'test@example.com',
            'is_admin' => true,
        ]);

       \App\Models\User::factory()->create([
           'name' => 'Test User',
           'email' => 'test2@example.com',
       ]);

       \App\Models\Property::factory(10)->create([
           'user_id' => 1,
       ]);

       \App\Models\Property::factory(10)->create([
           'user_id' => 2,
       ]);

       $options = \App\Models\Option::factory(5)->create();

         \App\Models\Property::all()->each(function ($property) use ($options) {
              $property->options()->attach(
                $options->random(rand(1, 5))->pluck('id')->toArray()
              );
         });
    }
}
