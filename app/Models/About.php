<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About
{
    private static $about_me = [
        [
            'id' => '1',
            'nama' => "Alfi Akbar Ridzki",
            'email' => "akbaralfi66@gmail.com",
            'img' => "img/alfi.jpg",
            'img1' => "../img/alfi.jpg"
        ],
        [
            'id' => '2',
            'nama' => "Galang Yoga Pratama",
            'email' => "galang058@gmail.com",
            'img' => "img/galang1.JPG"
        ],
        [
            'id' => '3',
            'nama' => "Uyun Duck",
            'email' => "duck.book@gmail.com",
            'img' => "img/nurul1.JPG"
        ]
        ];

    public static function all() {
        return collect(self::$about_me);
    }

    public static function find($id) {
        $abouts = static::all();
        return $abouts->firstWhere('id', $id);
    }
}
