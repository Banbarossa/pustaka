<?php

namespace Database\Seeders;

use App\Models\Tujuan;
use Illuminate\Database\Seeder;

class TujuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tujuan = [
            'Membaca', 'Meminjam Buku',
        ];

        foreach ($tujuan as $item) {
            Tujuan::create([
                'tujuan' => $item,
            ]);
        }
    }
}
