<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
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
                'nama' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'alamat' => 'Malang',
                'role' => 'admin',
            ],
            [
                'nama' => 'Staff',
                'email' => 'staff@gmail.com',
                'password' => Hash::make('staff'),
                'alamat' => 'Probolinggo',
                'role' => 'staff',
            ],
        ];

        foreach($data as $row){
            User::create([
                'nama' => $row['nama'],
                'email' => $row['email'],
                'password' => $row['password'],
                'alamat' => $row['alamat'],
                'role' => $row['role'],
                'foto' => null,
            ]);
        }
    }
}
