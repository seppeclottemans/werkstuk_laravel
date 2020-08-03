<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            ItemSeeder::class,
            ItemImagesSeeder::class,
            CategorySeeder::class,
            CategoryItemSeeder::class,
            CategoryUserSeeder::class
        ]);
    }
}
