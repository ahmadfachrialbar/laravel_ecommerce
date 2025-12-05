<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Order_item;
use App\Models\Product;


class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        // Jika belum login → redirect ke login
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login dulu untuk melanjutkan checkout.');
        }

        // Ambil cart dari database user
        $cart = Auth::user()->carts()->with('product')->get();

        if ($cart->count() == 0) {
            return redirect('/cart')->with('error', 'Keranjangmu kosong.');
        }

        // Hitung subtotal + berat
        $subtotal = 0;
        $weight   = 0;

        foreach ($cart as $item) {
            $subtotal += $item->product->price * $item->qty;
            $weight   += $item->product->weight * $item->qty;
        }

        return view('checkout.index', compact('cart', 'subtotal', 'weight'));
    }


    public function store(Request $request)
    {
        // VALIDASI
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required',
            'phone'      => 'required',
            'address'    => 'required',
            'city'       => 'required',
            'province'   => 'required',
            'postal_code'=> 'required',
            'shipping'   => 'required',
            'payment'    => 'required',
        ]);

        // AMBIL CART USER
        $cart = Auth::user()->carts()->with('product')->get();

        if ($cart->count() == 0) {
            return redirect('/cart')->with('error', 'Keranjang kosong.');
        }

        // HITUNG
        $subtotal = 0;
        $weight   = 0;

        foreach ($cart as $item) {
            $subtotal += $item->product->price * $item->qty;
            $weight   += $item->product->weight * $item->qty;
        }

        // Ongkir simple (contoh)
        $shipping_cost = $request->shipping === 'express' ? 35000 :
                         ($request->shipping === 'sameday' ? 50000 : 15000);

        $total = $subtotal + $shipping_cost;

        // BUAT ORDER
        $order = Order::create([
            'user_id'       => Auth::id(),
            'order_number'  => 'INV-' . strtoupper(Str::random(8)),
            'full_name'     => $request->first_name . ' ' . $request->last_name,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'province_name' => $request->province,
            'city_name'     => $request->city,
            'postal_code'   => $request->postal_code,
            'courier'       => $request->shipping,
            'weight'        => $weight,
            'subtotal'      => $subtotal,
            'shipping_cost' => $shipping_cost,
            'total'         => $total,
            'payment_status'=> 'unpaid',
            'status'        => 'pending',
        ]);

        // SIMPAN ORDER ITEMS
        foreach ($cart as $item) {
            Order_item::create([
                'order_id'  => $order->id,
                'product_id'=> $item->product_id,
                'qty'       => $item->qty,
                'size'      => $item->size,
                'color'     => $item->color,
                'price'     => $item->product->price,
                'subtotal'  => $item->product->price * $item->qty,
            ]);
        }

        // KOSONGKAN CART USER
        Auth::user()->carts()->delete();

        return redirect()->route('orders.show', $order->id)
            ->with('success', 'Pesanan berhasil dibuat!');
    }
}
