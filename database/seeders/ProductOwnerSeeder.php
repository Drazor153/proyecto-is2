<?php

namespace Database\Seeders;

use App\Models\ProductOwner;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductOwnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $new_po = new ProductOwner();
        $new_po->name = 'Bchoquete';
        $new_po->save();

        $new_po2 = new ProductOwner();
        $new_po2->name = 'Jacksito';
        $new_po2->save();

        ProductOwner::factory(9)->create();
    }
}
