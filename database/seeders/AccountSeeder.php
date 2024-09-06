<?php

namespace Database\Seeders;

use App\Models\Account;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $account = new Account();
        $account->name = 'Banco Ganadero';
        $account->cuenta = '123456789';
        $account->status = 'Active';
        $account ->balance = 100;
        $account->save();

        $account1 = new Account();
        $account1->name = 'Banco Union';
        $account1->cuenta = '987654321';
        $account1->status = 'Active';
        $account1 ->balance = 500;
        $account1->save();

        $account2 = new Account();
        $account2->name = 'Banco do Brasil';
        $account2->cuenta = '1234567890';
        $account2->status = 'Active';
        $account2 ->balance = 1000;
        $account2->save();

        $account3 = new Account();
        $account3->name = 'Banco Sol';
        $account3->cuenta = '123456789000';
        $account3->status = 'Active';
        $account3 ->balance = 0;
        $account3->save();
    }
}
