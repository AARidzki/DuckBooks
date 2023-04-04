<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

use App\Province;
use App\Models\Book;
use App\Models\Order;
use App\Models\Customer;
use App\Models\OrderDetail;
use App\Http\Controllers\Controller;


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

public function processCheckout(Request $request)
{
    
    //VALIDASI DATANYA
    $this->validate($request, [
        'customer_name' => 'required|string|max:100',
        'customer_phone' => 'required',
        'email' => 'required|email',
        'customer_address' => 'required|string'
    ]);

    //INISIASI DATABASE TRANSACTION
    //DATABASE TRANSACTION BERFUNGSI UNTUK MEMASTIKAN SEMUA PROSES SUKSES UNTUK KEMUDIAN DI COMMIT AGAR DATA BENAR BENAR DISIMPAN, JIKA TERJADI ERROR MAKA KITA ROLLBACK AGAR DATANYA SELARAS
    DB::beginTransaction();
    try {
        //CHECK DATA CUSTOMER BERDASARKAN EMAIL
        $customer = Customer::where('email', $request->email)->first();
        //JIKA DIA TIDAK LOGIN DAN DATA CUSTOMERNYA ADA
        if (!auth()->check() && $customer) {
            //MAKA REDIRECT DAN TAMPILKAN INSTRUKSI UNTUK LOGIN 
            return redirect()->back()->with(['error' => 'Silahkan Login Terlebih Dahulu']);
        }

        //AMBIL DATA KERANJANG
        $carts = $this->getCarts();
        //HITUNG SUBTOTAL BELANJAAN
        $subtotal = collect($carts)->sum(function($q) {
            return $q['qty'] * $q['price'];
        });

        //SIMPAN DATA CUSTOMER BARU
        $customer = Customer::create([
            'name' => $request->customer_name,
            'email' => $request->email,
            'notelp' => $request->customer_phone,
            'address' => $request->customer_address,
            'status' => false
        ]);

        //SIMPAN DATA ORDER
        $order = Order::create([
            'invoice' => Str::random(4) . '-' . time(), //INVOICENYA KITA BUAT DARI STRING RANDOM DAN WAKTU
            'customer_id' => $customer->id,
            'customer_name' => $customer->name,
            'customer_phone' => $request->customer_phone,
            'customer_address' => $request->customer_address,
            'subtotal' => $subtotal
        ]);

        //LOOPING DATA DI CARTS
        foreach ($carts as $row) {
            //AMBIL DATA PRODUK BERDASARKAN PRODUCT_ID
            $buku = Book::find($row['id']);
            //SIMPAN DETAIL ORDER
            OrderDetail::create([
                'order_id' => $order->id,
                'book_id' => $row['id'],
                'price' => $row['price'],
                'qty' => $row['qty'],
                // 'weight' => $buku->weight
            ]);
        }
        
        //TIDAK TERJADI ERROR, MAKA COMMIT DATANYA UNTUK MENINFORMASIKAN BAHWA DATA SUDAH FIX UNTUK DISIMPAN
        DB::commit();

        $carts = [];
        //KOSONGKAN DATA KERANJANG DI COOKIE
        $cookie = cookie('buku-keranjang', json_encode($carts), 2880);
        //REDIRECT KE HALAMAN FINISH TRANSAKSI
        return redirect(route('front.finish_checkout', $order->invoice))->cookie($cookie);
    } catch (\Exception $e) {
        //JIKA TERJADI ERROR, MAKA ROLLBACK DATANYA
        DB::rollback();
        //DAN KEMBALI KE FORM TRANSAKSI SERTA MENAMPILKAN ERROR
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
}

public function checkoutFinish($invoice)
{
    //AMBIL DATA PESANAN BERDASARKAN INVOICE
    $order = Order::with(['customer.address'])->where('invoice', $invoice)->first();
    //LOAD VIEW checkout_finish.blade.php DAN PASSING DATA ORDER
    return view('ecommerce.checkout_finish', compact('order'));
}


}
