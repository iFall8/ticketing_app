<?php

namespace Database\Seeders;

use App\Models\Tiket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    public function run(): void
    {
        $tickets = [
            [
                'event_id' => 1,
                'tipe' => 'premium',
                'harga' => 1500000,
                'stok' => 100,
            ],
            [
                'event_id' => 1,
                'tipe' => 'Reguler',
                'harga' => 500000,
                'stok' => 500,
            ],
            [
                'event_id' => 2,
                'tipe' => 'Premium',
                'harga' => 200000,
                'stok' => 300,
            ],
            [
                'event_id' => 3,
                'tipe' => 'premium',
                'harga' => 300000,
                'stok' => 200,
            ],
        ];

        foreach ($tickets as $ticket) {
            Tiket::create($ticket);
        }
    }
}