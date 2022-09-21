<?php

namespace Database\Seeders;

use App\Models\Pasien;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class PasienSeeder extends Seeder
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
                'dokter_id' => 1,
                'nik' => '1234567887654321',
                'nama_pasien' => 'Alshad Irham',
                'alamat' => 'Kediri',
                'tanggal_datang' => Carbon::now(),
                'keluhan' => 'Sakit Gigi',
            ],
            [
                'dokter_id' => 2,
                'nik' => '1234567887654323',
                'nama_pasien' => 'Doni Salmanan',
                'alamat' => 'Lumajang',
                'tanggal_datang' => Carbon::now(),
                'keluhan' => 'Sakit Jantung',
            ],
        ];

        foreach($data as $row){
            Pasien::create([
                'dokter_id' => $row['dokter_id'],
                'nik' => $row['nik'],
                'nama_pasien' => $row['nama_pasien'],
                'alamat' => $row['alamat'],
                'tanggal_datang' => $row['tanggal_datang'],
                'keluhan' => $row['keluhan'],
            ]);
        }
    }
}
