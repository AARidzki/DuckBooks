<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    //protected $fillable = ['tittle', 'pengarang', 'terbit', 'stok', 'harga'];
    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function discounts()
    {
        return $this->hasMany(Discount::class);
    }

    public function foto()
    {
        return $this->belongsTo(Foto::class);
    }


    // public function getRouteKeyName()
    // {
    //     return 'id';   
    // }
}
