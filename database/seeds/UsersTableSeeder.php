<?php

use App\Model\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::truncate();
        Schema::enableForeignKeyConstraints();

        User::create([
            'name'         => '和田邦康',
            'email'        => 'k-wada@mikunilabo.com',
            'password'     => bcrypt('p1p1p1p1'),
        ]);

        User::create([
            'name'         => 'テストユーザ',
            'email'        => 'mikunilabo@gmail.com',
            'password'     => bcrypt('p1p1p1p1'),
        ]);
    }
}
