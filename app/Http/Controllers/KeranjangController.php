<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Models\Book;


class KeranjangController extends Controller
{
    //
public function tambah(Request $request){
    $this->validate($request,[
        'id'=> 'required|exists:books,id',
        'qty'=> 'required|integer'
    ]);

    $keranjang=json_decode($request->cookie('buku-keranjang'),true);
  
    if($keranjang&& array_key_exists($request->id,$keranjang)){
        $keranjang[$request->id]['qty'] +=$request->qty;
}else{
    $buku = Book::find($request->id);
    $keranjang[$request->id] = [
        'qty' => $request->qty,
        'id' => $buku->id,
        'name' => $buku->tittle,
        'price' => $buku->harga,
        'image' => $buku->image
    ];
}
$cookie = Cookie::queue('buku-keranjang', json_encode($keranjang), 2880);
    //STORE KE BROWSER UNTUK DISIMPAN
    return redirect()->back()->cookie('buku-keranjang', json_encode($keranjang), 2880);
  

}

public function listCart()
{
    //MENGAMBIL DATA DARI COOKIE
    $keranjang = json_decode(request()->cookie('buku-keranjang'), true);
    $token=request()->cookie('buku-keranjang');
    dd($token);
    //UBAH ARRAY MENJADI COLLECTION, KEMUDIAN GUNAKAN METHOD SUM UNTUK MENGHITUNG SUBTOTAL
    $subtotal = collect($keranjang)->sum(function($q) {
        return $q['qty'] * $q['price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
    });
    //LOAD VIEW CART.BLADE.PHP DAN PASSING DATA CARTS DAN SUBTOTAL
    return view('keranjang')->with(compact('keranjang', 'subtotal'));
}

}
