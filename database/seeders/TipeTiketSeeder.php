<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipeTiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipeTikets = [
            ['nama' => 'Reguler'],
            ['nama' => 'Premium'],
        ];

        foreach ($tipeTikets as $tipeTiket) {
            TipeTiket::create($tipeTiket);
        }
    }
}
