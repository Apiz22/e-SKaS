<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password123'), 
            'role' => 1, 
            'phone_number'=> '0134950244',
            'sekolah_id'=> '1',
        ]);

        //user
        User::create([
            'name' => 'test',
            'email' => 'test@example.com',
            'password' => Hash::make('pass123'), 
            'role' => 2, 
            'phone_number'=> '0134950244',
            'sekolah_id'=> '2',
        ]);
    }
}
