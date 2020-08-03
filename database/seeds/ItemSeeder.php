<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'band saw',
            'description' => 'You can rent this band saw for two weeks.',
            'current_amount' => 2,
            'total_amount' => 2
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Hammer',
            'description' => 'You can rent this hammer for a maximum of 5 weeks.',
            'current_amount' => 5,
            'total_amount' => 5
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Woodworking starter-kit',
            'description' => 'This is a standard woodworking kit that I do not use anymore. You can rent it as long as you like.',
            'current_amount' => 1,
            'total_amount' => 1
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Chisels kit',
            'description' => 'Chisels kit with 6 different chisels. The chisels are all different sizes.',
            'current_amount' => 8,
            'total_amount' => 8
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Steel saw',
            'description' => 'Stainless steel hand saw by forge.',
            'current_amount' => 3,
            'total_amount' => 3
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Drill press',
            'description' => 'Automatic drill press by Wilson.',
            'current_amount' => 1,
            'total_amount' => 1
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Automatic hand drill',
            'description' => 'Automatic hand drill by Panasonic.',
            'current_amount' => 2,
            'total_amount' => 2
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Automatic hand drill',
            'description' => 'Red Automatic hand drill by Craftsman.',
            'current_amount' => 5,
            'total_amount' => 5
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Gardening-kit',
            'description' => 'Basic gardening kit. Rent as long as you like.',
            'current_amount' => 1,
            'total_amount' => 1
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Gardening tools',
            'description' => 'Basic gardening tools.',
            'current_amount' => 3,
            'total_amount' => 3
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Pen soldering iron',
            'description' => 'Small portable iron solder pen.',
            'current_amount' => 2,
            'total_amount' => 2
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Welding tool + mask',
            'description' => 'Professional welding tool and safety mask.',
            'current_amount' => 1,
            'total_amount' => 1
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'measuring tape',
            'description' => '5m long measuring tape.',
            'current_amount' => 3,
            'total_amount' => 3
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'construction safety kit',
            'description' => 'kit contains: gloves, helmet, safety glasses, ear plugs and a fluorescent jacket.',
            'current_amount' => 2,
            'total_amount' => 2
        ]);

        DB::table('items')->insert([
            'user_id' => '1',
            'title' => 'Safety shoes size 43',
            'description' => 'Safety shoes size 43.',
            'current_amount' => 2,
            'total_amount' => 2
        ]);
    }
}
