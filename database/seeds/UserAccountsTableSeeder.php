<?php

use Illuminate\Database\Seeder;

class UserAccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\UserAccount::class, 1)->create([
            'email'=> 'client1@user.com',
            'account_id'=> 1,
            'password'=> bcrypt('123456')
        ]);

        factory(\App\UserAccount::class, 1)->create([
            'email'=> 'client2@user.com',
            'account_id'=> 2,
            'password'=> bcrypt('123456')
        ]);

        echo "Criando usuário account";
    }
}
