<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'seppe',
            'email' => 'seppe.clottemans@student.ehb.be',
            'password' => Hash::make('testenmaar'),
            'is_admin' => '1'
        ]);

        DB::table('users')->insert([
            'name' => 'gebruiker',
            'email' => 'gebruiker@gebruiker.com',
            'password' => Hash::make('123456')
        ]);

        DB::table('users')->insert([
            'name' => 'Seppe user',
            'email' => 'seppeclottemans@student.ehb.be',
            'password' => Hash::make('testenmaar')
        ]);
    }
}
