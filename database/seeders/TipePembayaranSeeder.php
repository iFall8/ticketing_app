<?php

namespace Database\Seeders;

use App\Models\TipePembayaran;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipePembayaranSeeder extends Seeder
{
    public function run(): void
    {
        $tipePembayarans = [
            ['nama' => 'Transfer Bank'],
            ['nama' => 'E-Wallet'],
            ['nama' => 'Tunai'],
        ];

        foreach ($tipePembayarans as $tipePembayaran) {
            TipePembayaran::create($tipePembayaran);
        }
    }
}
