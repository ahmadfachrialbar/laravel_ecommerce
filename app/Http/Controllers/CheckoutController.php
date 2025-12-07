<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\Product;
use App\Models\ShippingCost;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\User;

class CheckoutController extends Controller
{
    // ===============================
    // TAMPILAN CHECKOUT
    // ===============================
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login dulu.');
        }

        $cart = Cart::where('user_id', auth()->id())->with('product')->get();

        if ($cart->isEmpty()) {
            return redirect()->back()->with('error', 'Keranjang belanja masih kosong!');
        }

        // Hitung subtotal
        $subtotal = $cart->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });

        // Total barang
        $total_qty = $cart->sum('quantity');

        // Ambil semua ongkir
        $shippingCosts = ShippingCost::all();

        return view('checkout.index', compact('cart', 'subtotal', 'total_qty', 'shippingCosts'));
    }

    // ===============================
    // PROSES & SIMPAN ORDER
    // ===============================
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name'  => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'address'    => 'required',
            'city'       => 'required',
            'province'   => 'required',
            'postal_code' => 'required',
            'shipping_id' => 'required|exists:shipping_costs,id',
        ]);

        // Ambil biaya kirim
        $shipping = ShippingCost::findOrFail($request->shipping_id);

        // Ambil cart user
        $cart = Cart::with('product')->where('user_id', auth()->id())->get();

        if ($cart->isEmpty()) {
            return back()->with('error', 'Keranjang kosong.');
        }

        // Hitung subtotal
        $subtotal = $cart->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Total akhir
        $total = $subtotal + $shipping->price;

        // Simpan order
        $order = Order::create([
            'user_id'          => auth()->id(),
            'full_name'        => $request->first_name . ' ' . $request->last_name,
            'email'            => $request->email,
            'phone'            => $request->phone,
            'address'          => $request->address,
            'city'             => $request->city,
            'province'         => $request->province,
            'postal_code'      => $request->postal_code,
            'notes'            => $request->notes,
            'shipping_costs_id' => $shipping->id,   // ⬅ SESUAI MIGRATION
            'subtotal'         => $subtotal,
            'shipping_price'   => $shipping->price,
            'total'            => $total,
            'shipping_status'  => 'pending',
            'status'           => 'pending',
        ]);

        // Simpan item
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id'  => $order->id,
                'product_id' => $item->product_id,
                'name'      => $item->product->name,
                'size'      => $item->size,
                'color'     => $item->color,
                'qty'  => $item->quantity,
                'price'     => $item->product->price,
                'subtotal'     => $item->product->price * $item->quantity,
            ]);
        }

        // Hapus cart
        Cart::where('user_id', auth()->id())->delete();

        return redirect()->route('checkout.confirm', $order->id);
    }

    public function confirm($orderId)
    {
        $order = Order::findOrFail($orderId);

        $shipping = ShippingCost::find($order->shipping_costs_id);

        $orderItems = OrderItem::with('product')
            ->where('order_id', $orderId)
            ->get();

        $subtotal = $order->subtotal;
        $shippingCost = $shipping->price;
        $tax = $subtotal * 0.11;
        $total = $order->total;

        return view('checkout.confirm', compact(
            'order',
            'shipping',
            'orderItems',
            'subtotal',
            'shippingCost',
            'tax',
            'total'
        ));
    }
}
