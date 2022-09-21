<?php

namespace Database\Seeders;

use App\Models\Dokter;
use Illuminate\Database\Seeder;

class DokterSeeder extends Seeder
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
                'nama_dokter' => 'Dr. Arif Muahammad St. MM,P',
                'alamat' => 'Surabaya',
                'spesialis' => 'Poli Gigi',
                'kode_dokter' => 'DK8493829',
            ],
            [
                'nama_dokter' => 'Dr. Julaiha Rumi St. MM,P',
                'alamat' => 'Pasuruan',
                'spesialis' => 'Poli Jantung',
                'kode_dokter' => 'DK8493834',
            ],
        ];

        foreach($data as $row){
            Dokter::create([
                'nama_dokter' => $row['nama_dokter'],
                'alamat' => $row['alamat'],
                'spesialis' => $row['spesialis'],
                'kode_dokter' => $row['kode_dokter'],
            ]);
        }
    }
}
