<?php

namespace Database\Seeders;

use App\Models\RawatInap;
use Illuminate\Database\Seeder;

class RawatInapSeeder extends Seeder
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
                'ruang_id' => 1,
                'pasien_id' => 1
            ],
            [
                'ruang_id' => 2,
                'pasien_id' => 2,
            ],
        ];

        foreach($data as $row){
            RawatInap::create([
                'ruang_id' => $row['ruang_id'],
                'pasien_id' => $row['pasien_id']
            ]);
        }
    }
}
