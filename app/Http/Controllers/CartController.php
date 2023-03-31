<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Province;
use App\Models\Book;


class CartController extends Controller
{
    //
public function tambah(Request $request){
    $this->validate($request,[
        'id'=> 'required|exists:books,id',
        'qty'=> 'required|integer'
    ]);

    $cart = $this->getCarts();
  
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
    $cart = $this->getCarts();
    //$carts=request()->cookie('buku-keranjang');
    
    //UBAH ARRAY MENJADI COLLECTION, KEMUDIAN GUNAKAN METHOD SUM UNTUK MENGHITUNG SUBTOTAL
    $subtotal = collect($cart)->sum(function($q) {
        return $q['qty'] * $q['price']; //SUBTOTAL TERDIRI DARI QTY * PRICE
    });
    //LOAD VIEW CART.BLADE.PHP DAN PASSING DATA CARTS DAN SUBTOTAL
    $carts=$cart;
    return view('cart',[
        'tittle'=>"Cart",
        'active' => 'login',
    ])->with(compact('carts', 'subtotal'));
}

public function updateCart(Request $request)
{
    //AMBIL DATA DARI COOKIE
    $carts = json_decode(request()->cookie('buku-keranjang'), true);
    //KEMUDIAN LOOPING DATA PRODUCT_ID, KARENA NAMENYA ARRAY PADA VIEW SEBELUMNYA
    //MAKA DATA YANG DITERIMA ADALAH ARRAY SEHINGGA BISA DI-LOOPING
    foreach ($request->id as $key => $row) {
        //DI CHECK, JIKA QTY DENGAN KEY YANG SAMA DENGAN PRODUCT_ID = 0
        if ($request->qty[$key] == 0) {
            //MAKA DATA TERSEBUT DIHAPUS DARI ARRAY
            unset($carts[$row]);
        } else {
            //SELAIN ITU MAKA AKAN DIPERBAHARUI
            $carts[$row]['qty'] = $request->qty[$key];
        }
    }
    //SET KEMBALI COOKIE-NYA SEPERTI SEBELUMNYA
    $cookie = cookie('buku-keranjang', json_encode($carts), 2880);
    //DAN STORE KE BROWSER.
    return redirect()->back()->cookie($cookie);
}

private function getCarts()
{
    $cart = json_decode(request()->cookie('buku-keranjang'), true);
    $cart = $cart != '' ? $cart:[];
    return $cart;
}

public function checkout()
{
    $carts = $this->getCarts(); //MENGAMBIL DATA CART
    //MENGHITUNG SUBTOTAL DARI KERANJANG BELANJA (CART)
    $subtotal = collect($carts)->sum(function($q) {
        return $q['qty'] * $q['price'];
    });
    //ME-LOAD VIEW CHECKOUT.BLADE.PHP DAN PASSING DATA PROVINCES, CARTS DAN SUBTOTAL
    return view('checkout', [
        'tittle' => 'Cart',
        'active' => 'login'
    ])->with(compact('carts', 'subtotal'));
}


}
