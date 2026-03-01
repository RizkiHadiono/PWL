<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    public function run(): void
    {
        $data = [];
        for ($i = 1; $i <= 15; $i++) {
            $data[] = [
                'barang_id' => $i,
                'kategori_id' => ($i % 5) + 1, // Membagi rata ke 5 kategori
                'barang_kode' => 'BRG' . str_pad($i, 2, '0', STR_PAD_LEFT),
                'barang_nama' => 'Barang Contoh ' . $i,
                'harga_beli' => 10000 * $i,
                'harga_jual' => 12000 * $i,
            ];
        }
        DB::table('m_barang')->insert($data);
    }
}