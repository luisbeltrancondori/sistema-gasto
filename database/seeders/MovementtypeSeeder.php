<?php

namespace Database\Seeders;

use App\Models\Movementtype;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovementtypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movementtype = new Movementtype();
        $movementtype->name = 'Ingresos';
        $movementtype->description = 'Registro de todos los ingresos generados';
        $movementtype->save();

        $movementtype1 = new Movementtype();
        $movementtype1->name = 'Egresos';
        $movementtype1->description = 'Registro de todos los egresos generados';
        $movementtype1->save();

    }
}
