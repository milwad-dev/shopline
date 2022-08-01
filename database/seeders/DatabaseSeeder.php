<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Modules\User\Models\User;

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
    }
}
