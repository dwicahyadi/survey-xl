<?php

namespace Database\Seeders;

use App\Models\Outlet;
use App\Models\OutletType;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class OutletTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OutletType::insert(
            [
                ['name' => 'D1'],
                ['name' => 'D2'],
                ['name' => 'DSPRO'],
                ['name' => 'Non-Dompul'],
                ['name' => 'RO'],
                ['name' => 'RO_DATA'],
                ['name' => 'RO_SERVER'],
                ['name' => 'ROCO'],
                ['name' => 'RODE'],
                ['name' => 'ROFM'],
                ['name' => 'RoGo'],
                ['name' => 'ROIS'],
                ['name' => 'RoKel'],
                ['name' => 'SD'],
            ]
        );
    }
}
