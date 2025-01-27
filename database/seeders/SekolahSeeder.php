<?php

namespace Database\Seeders;

use App\Models\Sekolah;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SekolahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schools = [
            [
                'nama' => 'Sekolah Kebangsaan Baling',
                'kod' => 'KA010',
                'jenis' => 'Sekolah Rendah',
                'pgb'=> 'Tuan Ahmad',
                'alamat' => 'Baling,09100',
            ],
            [
                'nama' => 'Sekolah Menengah Kebangsaan Baling',
                'kod' => 'KA020',
                'jenis' => 'Sekolah Menengah',
                'pgb'=> 'Puan Siti',
                'alamat' => 'Baling,09100',
            ],
        ];

        foreach ($schools as $school) {
            Sekolah::create($school);
        }
    }
}
