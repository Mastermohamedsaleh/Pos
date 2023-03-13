<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\User::create([
            'name'=>'super_admin',
            'email'=>'super@yahoo.com',
            'password'=>bcrypt('123456789')
        ]);
        $user->attachRole('super_admin');
    }
}
