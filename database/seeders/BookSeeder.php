<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'tittle' => 'Opera Phantom',
            'kode_buku' => 'NV00001',
            'pengarang' => 'George',
            'terbit' => '2010',
            'stok' => '0',
            'harga' => '70000',
            'category_id' => '1'
        ]);
        Book::create([
            'tittle' => 'One Piece',
            'kode_buku' => 'KM00001',
            'pengarang' => 'Oda',
            'terbit' => '1999',
            'stok' => '0',
            'harga' => '30000',
            'category_id' => '2'
        ]);
        Book::create([
            'tittle' => 'Naruto',
            'kode_buku' => 'KM00002',
            'pengarang' => 'Masashi Kishimoto',
            'terbit' => '1999',
            'stok' => '0',
            'harga' => '30000',
            'category_id' => '2'
        ]);
    }
}
