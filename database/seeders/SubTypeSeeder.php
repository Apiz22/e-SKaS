<?php

namespace Database\Seeders;

use App\Models\SubEviden;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //STD 1.1.1
        SubEviden::create([
            'description' => 'Membuat analisis SWOT/analisis lain yang bersesuaian',
            'type'=>'1.1.1.a',
        ]);
        SubEviden::create([
            'description' => 'Menentukan sasaran/Petunjuk Prestasi Utama',
            'type'=>'1.1.1.b',
        ]);
        SubEviden::create([
            'description' => 'Mendokumenkan hala tuju yang ditetapkan',
            'type'=>'1.1.1.c',
        ]);
        SubEviden::create([
            'description' => 'Menyebarluaskan hala tuju yang ditetapkan',
            'type'=>'1.1.1.d',
        ]);

        //STD 1.1.2
        SubEviden::create([
            'description'=> 'Menyediakan garis panduan/format perancangan ',
            'type'=> '1.1.2.a',
        ]);
        SubEviden::create([
            'description'=> 'Merangka strategik pencapaian sasaran',
            'type'=> '1.1.2.b',
        ]);
        SubEviden::create([
            'description'=> 'Memantau penyediaan perancangan strategik',
            'type'=> '1.1.2.c',
        ]);
        SubEviden::create([
            'description'=> 'Menyiapkan dokumen perancangan strategik',
            'type'=> '1.1.2.d',
            ]);

        //STD 1.1.3
        SubEviden::create([
            'description'=> 'Melaksanakan pemantauan',
            'type'=> '1.1.3.a',
            ]);
        SubEviden::create([
                'description'=> 'Menyediakan rumusan pemantauan',
                'type'=> '1.1.3.b',
             ]);
        SubEviden::create([
                'description'=> 'Mengambil tindakan susulan',
                'type'=> '1.1.3.c',
            ]);

            //std 1.1.4
        SubEviden::create([
            'description'=> 'Melaksanakan PdP',
            'type'=> '1.1.4.a',
        ]); 
        SubEviden::create([
            'description'=> 'Menyediakan Rancagan Pembelajaran Harian(RPH)',
            'type'=> '1.1.4.b',
        ]);
        SubEviden::create([
            'description'=> 'Melaksanakan peperiksaan/pentaksiran terhadap tahap penguasaan murid',
            'type'=> '1.1.4.c',
        ]);
        SubEviden::create([
            'description'=> 'Menyemak hasil kerja murid',
            'type'=> '1.1.4.d',
        ]);

        //std 1.1.5
        SubEviden::create([
            'description'=> 'Melaksanakan pencerapan PdP',
            'type'=> '1.1.5.a',
        ]);
        SubEviden::create([
            'description'=> 'Memberi maklum balas dan bimbingan',
            'type'=> '1.1.5.b',
        ]);
        SubEviden::create([
            'description'=> 'Mengambil tindakan susulan',
            'type'=> '1.1.5.c',
        ]);

        //Std 1.1.6
        SubEviden::create([
            'description'=> 'Menganalisa pencapian murid',
            'type'=> '1.1.6.a',
        ]);
        SubEviden::create([
            'description'=> 'Menyebarkan rumusan kemajuan dan pencapian murid',
            'type'=> '1.1.6.b',
        ]);
        SubEviden::create([
            'description'=> 'Mengadakan dialog prestasi',
            'type'=> '1.1.6.c',
        ]);
        SubEviden::create([
            'description'=> 'Mengambil tindakan susulan',
            'type'=> '1.1.6.d',
        ]);

        //Std 1.1.7
        SubEviden::create([
            'description'=> 'Mengesan jangkaan masalh/Isu',
            'type'=> '1.1.7.a',
        ]);
        SubEviden::create([
            'description'=> 'Mengenal pasti punca masalah/Isu',
            'type'=> '1.1.7.b',
        ]);
        SubEviden::create([
            'description'=> 'Mengambil tindakan terhadap masalah/Isu',
            'type'=> '1.1.7.c',
        ]);
        SubEviden::create([
            'description'=> 'Menyelesaikan masalah/Isu',
            'type'=> '1.1.7.d',
        ]);
        SubEviden::create([
            'description'=> 'Mengambil langkah kawalan/tindakan pencegahan bagi memastikan masalah/Isu tidak berulang',
            'type'=> '1.1.7.e',
        ]);

        //Std 1.2.1
        SubEviden::create([
            'description'=> 'Memberikan taklimat benkel/kursus/ceramah',
            'type'=> '1.2.1.a',
        ]);
        SubEviden::create([
            'description'=> 'Memberikan panduan/tunjuk ajar/tunjuk cara/nasihat/penerangan',
            'type'=> '1.2.1.b',
        ]);
        SubEviden::create([
            'description'=> 'Memberi maklum balas berkaitan prestasi kerja',
            'type'=> '1.2.1.c',
        ]);

        //std 1.2.2
        SubEviden::create([
            'description'=> 'Memberikan panduan/tunjuk ajar/tunjuk cara/nasihat/penerangan',
            'type'=> '1.2.2.a',
        ]);
        SubEviden::create([
            'description'=> 'Memberi maklum balas berkaitan prestasi kerja',
            'type'=> '1.2.2.b',
        ]);
        SubEviden::create([
            'description'=> 'Memberi pendedahan berkaitan tugas kepimpinan',
            'type'=> '1.2.2.c',
        ]);

        //std 1.3.1
        SubEviden::create([
            'description'=> 'Melaksanakan tugas berkualiti',
            'type'=> '1.3.1.a',
        ]);
        SubEviden::create([
            'description'=> 'Menampilkan diri berwibawa',
            'type'=> '1.3.1.b',
        ]);
        SubEviden::create([
            'description'=> 'Bertindak sebagai pakar rujuk',
            'type'=> '1.3.1.c',
        ]);
        SubEviden::create([
            'description'=> 'Memperlihatkan komunikasi yang berkesan',
            'type'=> '1.3.1.d',
        ]);

        //std 1.3.2
        SubEviden::create([
            'description'=> 'Menyediakan saluran untuk berkomunikasi',
            'type'=> '1.3.2.a',
        ]);
        SubEviden::create([
            'description'=> 'Mendengar pandangan daripada pelbagai pihak',
            'type'=> '1.3.2.b',
        ]);
        SubEviden::create([
            'description'=> 'Menerima pandangan/maklum balas yang berbeza',
            'type'=> '1.3.2.c',
        ]);
        SubEviden::create([
            'description'=> 'Mengambil tindakan terhadap pandangan/ maklum balas',
            'type'=> '1.3.2.d',
        ]);

        //std 1.3.3
        SubEviden::create([
            'description'=> 'Memberikan maklum balas positif berkaitan prestasi/ kemajuan/ pencapian kerja',
            'type'=> '1.3.3.a',
        ]);
        SubEviden::create([
            'description'=> 'Memberikan penghargaan/ pengiktarafan',
            'type'=> '1.3.3.b',
        ]);
        SubEviden::create([
            'description'=> 'Menyediakan keperluan dan kemudahan',
            'type'=> '1.3.3.c',
        ]);
        SubEviden::create([
            'description'=> 'Melibatkan diri dalam aktiviti',
            'type'=> '1.3.3.d',
        ]);

        //stnadard 2
        //std 2.1.1
        SubEviden::create([
            'description'=> 'Mengagihkan tugas',
            'type'=> '2.1.1.a',
        ]);
        SubEviden::create([
            'description'=> 'Menyediakan perincian tugas',
            'type'=> '2.1.1.b',
        ]);
        SubEviden::create([
            'description'=> 'Menyebarluaskan perincian tugas',
            'type'=> '2.1.1.c',
        ]);
        SubEviden::create([
            'description'=> 'Menilai prestasi kerja',
            'type'=> '2.1.1.d',
        ]);
        SubEviden::create([
            'description'=> 'Melaksanakan urusan perkhidmatan (SPP/ePROPER)',
            'type'=> '2.1.1.e',
        ]);
    }

}
