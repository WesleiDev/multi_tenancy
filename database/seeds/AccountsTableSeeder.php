<?php

use Illuminate\Database\Seeder;

class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Account::class, 2)->create([
            'subdomain' => 'client1'
        ]);

//        factory(\App\Account::class, 2)->create([
//            'subdomain' => 'client2'
//        ]);

        echo "Criando Accounts";
    }
}
