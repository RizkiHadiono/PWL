<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            ['supplier_id' => 1, 'supplier_kode' => 'SPL01', 'supplier_nama' => 'PT. Baju Nusantara', 'supplier_alamat' => 'Jakarta'],
            ['supplier_id' => 2, 'supplier_kode' => 'SPL02', 'supplier_nama' => 'CV. Elektro Jaya', 'supplier_alamat' => 'Bandung'],
            ['supplier_id' => 3, 'supplier_kode' => 'SPL03', 'supplier_nama' => 'UD. Pangan Makmur', 'supplier_alamat' => 'Surabaya'],
        ];
        DB::table('m_supplier')->insert($data);
    }
}