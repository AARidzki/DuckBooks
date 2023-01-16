<?php

namespace App\Http\Controllers;

use App\Models\Discount;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Requests\StoreDiscountRequest;
use App\Http\Requests\UpdateDiscountRequest;


class DashboardDiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.discounts.index', [
            'discounts' => Discount::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.discounts.create', [
            'books' => Book::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiscountRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'books_id' => 'required',
            'kode_promo' => 'required|unique:discounts',
            'promo' => 'required',
            'expire' => 'required|date|after:date',
            'count' => 'required'
        ]);

        Discount::create($validatedData);

        return redirect('/dashboard/discounts')->with('success', 'Promo baru sudah ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        return view('dashboard.discounts.show', [
            'discount' => $discount
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return view('dashboard.discounts.edit', [
            'discount' => $discount,
            'books' => Book::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiscountRequest  $request
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $rules = [
            'books_id' => 'required',
            'promo' => 'required',
            'expire' => 'required|date',
            'count' => 'required'
        ];

        if ($request->kode_promo != $discount->kode_promo) {
            $rules['kode_promo'] = 'required|unique:discounts';
        }

        $validatedData = $request->validate($rules);

        Discount::where('id', $discount->id)
            ->update($validatedData);

        return redirect('/dashboard/discounts')->with('success', 'Promo berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        Discount::destroy($discount->id);

        return redirect('/dashboard/discounts')->with('success', 'Promo sudah dihapus!');
    }
}
