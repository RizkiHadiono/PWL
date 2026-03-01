<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'stok_id' => $i,
                // ceil($i / 5) akan membagi: ID 1-5 ke Supplier 1, 6-10 ke Supplier 2, 11-15 ke Supplier 3
                'supplier_id' => ceil($i / 5), 
                'barang_id' => $i,
                'user_id' => 1, // Diasumsikan diinput oleh Admin (user_id 1)
                'stok_tanggal' => now(),
                'stok_jumlah' => 100,
            ];
        }
        DB::table('t_stok')->insert($data);
    }
}