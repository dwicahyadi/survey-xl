<?php

namespace Database\Seeders;

use Eloquent;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        \DB::unprepared(file_get_contents(storage_path('sql/region.sql')));
    }
}
