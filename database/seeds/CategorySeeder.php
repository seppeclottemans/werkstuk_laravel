<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'woodworking'
        ]);

        DB::table('categories')->insert([
            'name' => 'automatic'
        ]);

        DB::table('categories')->insert([
            'name' => 'drills'
        ]);

        DB::table('categories')->insert([
            'name' => 'gardening'
        ]);

        DB::table('categories')->insert([
            'name' => 'welding'
        ]);

        DB::table('categories')->insert([
            'name' => 'construction'
        ]);

        DB::table('categories')->insert([
            'name' => 'electronics'
        ]);

        DB::table('categories')->insert([
            'name' => 'measuring'
        ]);

        DB::table('categories')->insert([
            'name' => 'accessories'
        ]);

        DB::table('categories')->insert([
            'name' => 'safety'
        ]);

        DB::table('categories')->insert([
            'name' => 'saws'
        ]);

        DB::table('categories')->insert([
            'name' => 'hand tools'
        ]);
    }
}
