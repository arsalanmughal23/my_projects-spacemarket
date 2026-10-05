<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
            'email' => 'super-admin@yopmail.com',
            'password' => Hash::make('123456'),
        ]);

        DB::table('roles')->insert([
            'name' => "Super-Admin",
        ]);

    }
}
