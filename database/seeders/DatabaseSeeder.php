<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public static array $seeders;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        foreach (self::$seeders as $seeder) {
            $this->call($seeder);
        }

        foreach (config('shareConfig.factories', []) as $key) {
            $key['model']::factory($key['count'])->create();
        }
    }
}
