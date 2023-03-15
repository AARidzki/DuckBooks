<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Models\Book;


class CartController extends Controller
{
    //
public function tambah(Request $request){
    $this->validate($request,[
        'id'=> 'required|exists:books,id',
        'qty'=> 'required|integer'
    ]);

    $cart=json_decode($request->cookie('buku-keranjang'),true);
  
    if($cart&& array_key_exists($request->id,$cart)){
        $cart[$request->id]['qty'] +=$request->qty;
}else{
    $buku = Book::find($request->id);
    $cart[$request->id] = [
        'qty' => $request->qty,
        'id' => $buku->id,
        'name' => $buku->tittle,
        'price' => $buku->harga,
        'image' => $buku->image
    ];
}
$cookie = Cookie::queue('buku-keranjang', json_encode($cart), 2880);
    //STORE KE BROWSER UNTUK DISIMPAN
    return redirect()->back()->cookie('buku-keranjang', json_encode($cart), 2880);
  

}

public function listCart()
{
    //MENGAMBIL DATA DARI COOKIE
    $cart = json_decode(request()->cookie('buku-keranjang'), true);
    //$carts=request()->cookie('buku-keranjang');
    
    //UBAH ARRAY MENJADI COLLECTION, KEMUDIAN GUNAKAN METHOD SUM UNTUK MENGHITUNG SUBTOTAL
    $subtotal = collect($cart)->sum(function($q) {
        return $q['qty'] * $q['price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
    });
    //LOAD VIEW CART.BLADE.PHP DAN PASSING DATA CARTS DAN SUBTOTAL
    $carts=$cart;
    return view('carts',[
        'tittle'=>"judul",
        'active' => 'login',
    ])->with(compact('carts', 'subtotal'));
}

}
