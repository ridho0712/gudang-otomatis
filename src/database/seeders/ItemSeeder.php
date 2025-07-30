<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Item::create(['name' => 'Kabel HDMI', 'sku' => 'HDMI001', 'description' => 'Kabel HDMI 2 meter']);
        Item::create(['name' => 'Mouse Wireless', 'sku' => 'MSW002', 'description' => 'Mouse tanpa kabel']);
    }
}
