<?php

namespace Database\Seeders;

use App\Models\Coin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CoinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coin = new Coin();
        $coin->name = 'Boliviano';
        $coin->symbol = 'BOB';
        $coin->code = 'Bs';
        $coin->country = 'Bolivia';
        $coin->save();

        $coin1 = new Coin();
        $coin1->name = 'Brasilero';
        $coin1->symbol = 'R$';
        $coin1->code = 'Real';
        $coin1->country = 'Brasil';
        $coin1->save();

        $coin2 = new Coin();
        $coin2->name = 'Dolares';
        $coin2->symbol = '$US';
        $coin2->code = '$us';
        $coin2->country = 'Estados Unidos';
        $coin2->save();
    }
}
