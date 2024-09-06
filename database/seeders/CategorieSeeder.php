<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorie = new Categorie();
        $categorie->name = 'Alimentación';
        $categorie->symbol = 'AL';
        $categorie->status = 'active';
        $categorie->save();

        $categorie1 = new Categorie();
        $categorie1->name = 'Sueldo';
        $categorie1->symbol = 'SU';
        $categorie1->status = 'active';
        $categorie1->save();

        $categorie2 = new Categorie();
        $categorie2->name = 'Gastos varios';
        $categorie2->symbol = 'GV';
        $categorie2->status = 'active';
        $categorie2->save();


        $categorie3 = new Categorie();
        $categorie3->name = 'Venta de medicamentos';
        $categorie3->symbol = 'VM';
        $categorie3->status = 'active';
        $categorie3->save();

        $categorie4 = new Categorie();
        $categorie4->name = 'Prestacion de Servicios';
        $categorie4->symbol = 'PS';
        $categorie4->status = 'active';
        $categorie4->save();

        $categorie5 = new Categorie();
        $categorie5->name = 'Educacion';
        $categorie5->symbol = 'ED';
        $categorie5->status = 'active';
        $categorie5->save();
    }
}
