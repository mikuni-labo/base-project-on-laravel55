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
            'role'         => 'master',
            'email'        => 'k-wada@mikunilabo.com',
            'password'     => bcrypt('p1p1p1p1'),
        ]);

        User::create([
            'name'         => '企業管理者',
            'role'         => 'company-admin',
            'email'        => 'redbull.816.com@gmail.com',
            'password'     => bcrypt('p1p1p1p1'),
        ]);

        User::create([
            'name'         => '店舗管理者',
            'role'         => 'store-admin',
            'email'        => 'red.bull.816.com@gmail.com',
            'password'     => bcrypt('p1p1p1p1'),
        ]);

        User::create([
            'name'         => '店舗管理者',
            'email'        => 're.d.bull.816.com@gmail.com',
            'password'     => bcrypt('p1p1p1p1'),
        ]);
    }
}
