<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        $detail_id = 1;
        
        for ($i = 1; $i <= 10; $i++) { // Looping 10 transaksi
            for ($j = 1; $j <= 3; $j++) { // Looping 3 barang setiap transaksi
                $data[] = [
                    'detail_id' => $detail_id++,
                    'penjualan_id' => $i,
                    'barang_id' => rand(1, 15), // Memilih barang secara acak dari 15 barang
                    'harga' => 12000,
                    'jumlah' => rand(1, 5), // Jumlah beli acak 1-5
                ];
            }
        }
        DB::table('t_penjualan_detail')->insert($data);
    }
}