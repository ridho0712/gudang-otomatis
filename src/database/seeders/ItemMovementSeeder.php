<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ItemMovement;

class ItemMovementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ItemMovement::create([
            'item_id' => 1,
            'warehouse_id' => 1,
            'type' => 'in',
            'quantity' => 100
        ]);

        ItemMovement::create([
            'item_id' => 2,
            'warehouse_id' => 2,
            'type' => 'in',
            'quantity' => 50
        ]);

        ItemMovement::create([
            'item_id' => 1,
            'warehouse_id' => 1,
            'type' => 'out',
            'quantity' => 20
        ]);
    }
}
