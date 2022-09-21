<?php

namespace Database\Seeders;

use App\Models\Pembayaran;
use Illuminate\Database\Seeder;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kode_pembayaran' => 'HL48758432',
                'user_id' => 2,
                'pasien_id' => 1,
                'total' => 1004000,
                'status' => 'paid',
            ],
            [
                'kode_pembayaran' => 'HL48758433',
                'user_id' => 2,
                'pasien_id' => 2,
                'total' => 2034000,
                'status' => 'paid',
            ],
        ];

        foreach($data as $row){
            Pembayaran::create([
                'kode_pembayaran' => $row['kode_pembayaran'],
                'user_id' => $row['user_id'],
                'pasien_id' => $row['pasien_id'],
                'total' => $row['total'],
                'status' => $row['status'],
            ]);
        }
    }
}
