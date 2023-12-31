<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */
    public function run()
    {
        Buku::create([
            'judul' => 'Pengenalan PHP',
            'pengarang' => 'M. Agus',
            'penerbit' => 'gramedia',
        ]);
    }
}
