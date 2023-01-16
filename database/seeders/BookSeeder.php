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
            'harga' => '70.0000',
            'category_id' => '1'
        ]);
        Book::create([
            'tittle' => 'One Piece',
            'kode_buku' => 'KM00001',
            'pengarang' => 'Oda',
            'terbit' => '1999',
            'stok' => '0',
            'harga' => '30.0000',
            'category_id' => '2'
        ]);
    }
}
