<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book
{
    private static $home_books = [
        [
            "tittle" => "Opera Phantom",
            "slug" => "opera-phantom",
            "penulis" => "Sage"
        ],
        [
            "tittle" => "One Piece",
            "slug" => "one-piece",
            "penulis" => "Oda"
        ],
    ];

    public static function all()
    {
        return collect(self::$home_books);
    }

    public static function find($slug)
    {
        $books = static::all();
        return $books->firstWhere('slug', $slug);
    }
}
