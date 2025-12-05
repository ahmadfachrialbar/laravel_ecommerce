<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addToCart(Request $request, $id)
    {
        $product = Product::with('category')->findOrFail($id);
        $qty = max(1, $request->quantity ?? 1);

        // ============ GUEST CART (SESSION) ============
        if (!Auth::check()) {
            $cart = session()->get('cart', []);

            if (isset($cart[$id])) {
                $cart[$id]['quantity'] += $qty;
            } else {
                $cart[$id] = [
                    'name' => $product->name,
                    'price' => $product->price,
                    'image' => $product->main_image,
                    'category' => $product->category->name ?? 'Uncategorized',
                    'quantity' => $qty
                ];
            }

            session()->put('cart', $cart);

            return back()->with('info', 'Produk ditambahkan ke keranjang.');
        }

        // ============ USER CART (DATABASE) ============
        $cart = Cart::firstOrNew([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        $cart->quantity = ($cart->exists ? $cart->quantity : 0) + $qty;
        $cart->save();

        return back()->with('success', 'Produk ditambahkan ke keranjang!');
    }

    public function index()
    {
        if (Auth::check()) {
            $items = Cart::with('product.category')
                ->where('user_id', Auth::id())
                ->get();
        } else {
            $sessionCart = session()->get('cart', []);
            $items = collect($sessionCart)->map(function ($item, $id) {
                return (object)[
                    'id' => $id,
                    'quantity' => $item['quantity'],
                    'product' => (object)[
                        'id' => $id,
                        'name' => $item['name'],
                        'price' => $item['price'],
                        'main_image' => $item['image'],
                        'category' => (object)[
                            'name' => $item['category']
                        ]
                    ]
                ];
            });
        }

        return view('cart.index', ['items' => $items]);
    }

    public function updateQuantity(Request $request, $id)
    {
        $quantity = max(1, (int)$request->quantity);

        if (Auth::check()) {
            $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $id)->first();

            if ($cart) {
                $cart->quantity = $quantity;
                $cart->save();
            }
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
                session()->put('cart', $cart);
            }
        }

        return back();
    }

    public function remove($id)
    {
        if (Auth::check()) {
            Cart::where('user_id', Auth::id())
                ->where('product_id', $id)
                ->delete();
        } else {
            $cart = session()->get('cart', []);
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back()->with('success', 'Produk dihapus dari keranjang.');
    }
}
