<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Cart;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        Auth::login($user);

        return redirect()->intended('/login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
        
        if (Auth::attempt($credentials)) {
            if (auth()->user()->role === 'admin') {
                return redirect()->route('filament.admin.pages.dashboard');
            } else {
                return redirect('/');
            }
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);

        if (Auth::attempt($credentials, $request->remember)) {

            // ========= MERGE GUEST CART TO USER CART =========
            if (session()->has('cart')) {
                foreach (session('cart') as $productId => $item) {
                    $existing = Auth::user()
                        ->carts()
                        ->where('product_id', $productId)
                        ->first();

                    if ($existing) {
                        $existing->quantity += $item['quantity'];
                        $existing->save();
                    } else {
                        Auth::user()->carts()->create([
                            'product_id' => $productId,
                            'quantity' => $item['quantity'],
                        ]);
                    }
                }
                session()->forget('cart');
            }

            return redirect()->intended('/');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
