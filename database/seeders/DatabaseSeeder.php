<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Movement;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(AccountSeeder::class);
        $this->call(CategorieSeeder::class);
        $this->call(CoinSeeder::class);
        $this-> call(MovementtypeSeeder::class);
        $this->call(UserSeeder::class);

        Storage::deleteDirectory('public/images');
        Storage::makeDirectory('public/images');

        Movement::factory(15)->create();
        Image::factory(4)->create();


    }
}
