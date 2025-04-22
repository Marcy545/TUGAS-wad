<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentSeeder extends Seeder
{
    public function run(): void
    {
        Equipment::create([
            'name' => 'Black Diamond Harness',
            'type' => 'Harness',
            'brand' => 'Black Diamond',
            'description' => 'Comfortable and safe harness for climbing.',
            'quantity' => 10,
            'rental_price' => 4.50,
            'is_available' => true,
        ]);

        Equipment::create([
            'name' => 'Petzl Helmet',
            'type' => 'Helmet',
            'brand' => 'Petzl',
            'description' => 'High-quality helmet for head protection.',
            'quantity' => 5,
            'rental_price' => 3.00,
            'is_available' => true,
        ]);
    }
}
