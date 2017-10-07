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
            'name'         => config('fixture.user_role.master'),
            'role'         => 'master',
            'email'        => 'k-wada@mikunilabo.com',
            'password'     => bcrypt('p1p1p1p1'),
        ]);

        User::create([
            'name'         => config('fixture.user_role.company-admin'),
            'role'         => 'company-admin',
            'email'        => 'redbull.816.com@gmail.com',
            'password'     => bcrypt('p1p1p1p1'),
        ]);

        User::create([
            'name'         => config('fixture.user_role.store-admin'),
            'role'         => 'store-admin',
            'email'        => 'red.bull.816.com@gmail.com',
            'password'     => bcrypt('p1p1p1p1'),
        ]);

        User::create([
            'name'         => config('fixture.user_role.store-user'),
            'email'        => 're.d.bull.816.com@gmail.com',
            'password'     => bcrypt('p1p1p1p1'),
        ]);
    }
}
