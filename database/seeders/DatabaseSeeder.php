<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        DB::table('products')->insert([
            [
                'product_id' => 'P0001',
                'name' => 'AQUA GELAS',
                'price' => 2500,
            ],
            [
                'product_id' => 'P0002',
                'name' => 'SUSU COKLAT',
                'price' => 6000,
            ],
            [
                'product_id' => 'P0003',
                'name' => 'YAKULT',
                'price' => 7000,
            ],
            [
                'product_id' => 'P0004',
                'name' => 'AIR MINERAL',
                'price' => 5000,
            ],
            [
                'product_id' => 'P0005',
                'name' => 'POCARI SWEAT',
                'price' => 6700,
            ],
            [
                'product_id' => 'P0006',
                'name' => 'TEH PUCUK',
                'price' => 5700,
            ],
        ]);

        // Seed data ke tabel Transaction
        DB::table('transactions')->insert([
            [
                'transaction_id' => 'T0001',
                'product_id' => 'P0001',
                'quantity' => 5,
            ],
            [
                'transaction_id' => 'T0001',
                'product_id' => 'P0004',
                'quantity' => 1,
            ],
            [
                'transaction_id' => 'T0001',
                'product_id' => 'P0006',
                'quantity' => 3,
            ],
            [
                'transaction_id' => 'T0002',
                'product_id' => 'P0002',
                'quantity' => 3,
            ],
            [
                'transaction_id' => 'T0002',
                'product_id' => 'P0003',
                'quantity' => 2,
            ],
            [
                'transaction_id' => 'T0002',
                'product_id' => 'P0005',
                'quantity' => 1,
            ],
        ]);

         // Seed data ke tabel Type
         DB::table('types')->insert([
            [
                'type_id' => 'TYPE1',
                'name' => 'No FEE',
            ],
            [
                'type_id' => 'TYPE2',
                'name' => 'With FEE',
            ],
        ]);
    }
}
