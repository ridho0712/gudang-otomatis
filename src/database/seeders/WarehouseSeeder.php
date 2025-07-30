<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Warehouse;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Warehouse::create(['name' => 'Gudang Pusat', 'location' => 'Jakarta']);
        Warehouse::create(['name' => 'Gudang Bandung', 'location' => 'Bandung']);
    }
}
