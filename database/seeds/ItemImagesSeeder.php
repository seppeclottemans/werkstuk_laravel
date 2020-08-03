<?php

use Illuminate\Database\Seeder;

class ItemImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('item_images')->insert([
            'item_id' => '1',
            'image_link' => 'storage/Lintzaag.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '2',
            'image_link' => 'storage/hamer1.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '2',
            'image_link' => 'storage/hamer2.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '3',
            'image_link' => 'storage/Woodworking-Tools.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '4',
            'image_link' => 'storage/chisels-kit.png'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '5',
            'image_link' => 'storage/saw.jpeg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '6',
            'image_link' => 'storage/drill-press.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '7',
            'image_link' => 'storage/panasonic-ey7443x-14-4v-automatic-drill-driver-body-only-pid49198_1.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '8',
            'image_link' => 'storage/615zGgBSSOL._AC_SX569_.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '9',
            'image_link' => 'storage/gardening-kit.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '10',
            'image_link' => 'storage/gardening-tools.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '11',
            'image_link' => 'storage/hand-welding-tool.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '12',
            'image_link' => 'storage/wlding-tool-and-mask.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '13',
            'image_link' => 'storage/mesuring-tape.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '14',
            'image_link' => 'storage/safety-kit.jpg'
        ]);

        DB::table('item_images')->insert([
            'item_id' => '15',
            'image_link' => 'storage/safety-shoes.jpg'
        ]);

    }
}
