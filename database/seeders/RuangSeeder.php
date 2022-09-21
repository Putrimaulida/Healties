<?php

namespace Database\Seeders;

use App\Models\Ruang;
use Illuminate\Database\Seeder;

class RuangSeeder extends Seeder
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
                'ruang' => 'Melati 1',
                'status' => 'used'
            ],
            [
                'ruang' => 'Mawar 1',
                'status' => 'unused',
            ],
            [
                'ruang' => 'Melati 2',
                'status' => 'unused'
            ],
            [
                'ruang' => 'Mawar 2',
                'status' => 'unused',
            ],
            [
                'ruang' => 'Melati 3',
                'status' => 'unused'
            ],
            [
                'ruang' => 'Mawar 3',
                'status' => 'used',
            ],
        ];

        foreach($data as $row){
            Ruang::create([
                'ruang' => $row['ruang'],
                'status' => $row['status']
            ]);
        }
    }
}
