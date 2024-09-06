<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Luis Beltran Condori Cano';
        $user->email = 'luisbeltrancondoricano@gmail.com';
        $user->password = bcrypt('123456');
        $user->save();

        $user1 = new User();
        $user1->name = 'Delia Guardia Cabrera';
        $user1->email = 'deliaguardia@gmail.com';
        $user1->password = bcrypt('654321');
        $user1->save();

    }
}
