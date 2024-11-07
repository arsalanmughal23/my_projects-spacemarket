<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'super-admin',
            'email' => 'super-admin@boilerplate.com',
            'password' => '123456',
        ]);

        DB::table('roles')->insert([
            'name' => "Super-Admin",
        ]);

    }
}
