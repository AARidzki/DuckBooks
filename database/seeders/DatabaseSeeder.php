<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Book;
use App\Models\Category;
use App\Models\Discount;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::create([
            'name' => 'AA Ridzki',
            // 'username' => 'AnggerLaw',
            'email' => 'AA@gmail.com',
            'notelp' => '08547874524',
            'address' => 'deket tmii',
            'status' => '0',
            'is_admin' => '1',
            'password' => bcrypt('password')
        ]);

        User::create([
            'name' => 'Yoga',
            // 'username' => 'Yoga',
            'email' => 'yoganj@gmail.com',
            'notelp' => '08468735432',
            'address' => 'deket ciracas',
            'status' => '0',
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);
        
        User::create([
            'name' => 'Rahul',
            // 'username' => 'Rahul',
            'email' => 'rabab@gmail.com',
            'notelp' => '08879685435',
            'address' => 'deket cijantung',
            'status' => '0',
            'is_admin' => '0',
            'password' => bcrypt('password')
        ]);

        $this->call([
            CategorySeeder::class,
            BookSeeder::class
        ]);

        // Category::create([
        //     'name' => 'Novel'
        // ]);
        // Category::create([
        //     'name' => 'Komik'
        // ]);

        // Book::create([
        //     'tittle' => 'Opera Phantom',
        //     'kode_buku' => 'NV00001',
        //     'pengarang' => 'George',
        //     'terbit' => '2010',
        //     'stok' => '0',
        //     'harga' => '70.000',
        //     'category_id' => '1'
        // ]);
        // Book::create([
        //     'tittle' => 'One Piece',
        //     'kode_buku' => 'KM00001',
        //     'pengarang' => 'Oda',
        //     'terbit' => '1998',
        //     'stok' => '0',
        //     'harga' => '30.000',
        //     'category_id' => '2'
        // ]);

        // Discount::create([
        //     'books_id' => '2',
        //     'kode_promo' => 'YogaAnj',
        //     'expire' => '', 
        //     'promo' => '0.1'
        // ]);

        
       //User::factory(3)->create();

        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
 