@extends('homepage.index')
@section('content')
<section class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <!-- Header -->
        <h1 class="text-2xl font-light tracking-tight mb-8">Keranjang Belanja</h1>

        <!-- Cart Items -->
        <div class="space-y-6">

            <!-- ITEM -->
            <div class="border border-gray-200 rounded-xl p-6 hover:border-gray-300 transition">
                <div class="flex flex-col md:flex-row gap-6">

                    <!-- Image -->
                    <div class="w-24 h-24 bg-gray-100 rounded-xl flex-shrink-0 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=300"
                            class="w-full h-full object-cover">
                    </div>

                    <!-- Content -->
                    <div class="flex-1">
                        <p class="text-sm font-medium mb-1">Polo Shirt Premium Navy</p>
                        <p class="text-xs text-gray-500 mb-3">Size: L</p>

                        <div class="flex items-center gap-6">
                            <!-- Qty -->
                            <div class="flex items-center gap-3">
                                <button class="w-8 h-8 border border-gray-300 flex items-center justify-center hover:border-gray-500 transition">-</button>
                                <span class="text-sm font-medium">2</span>
                                <button class="w-8 h-8 border border-gray-300 flex items-center justify-center hover:border-gray-500 transition">+</button>
                            </div>

                            <!-- Price -->
                            <p class="text-sm font-medium">Rp 225.000</p>
                        </div>
                    </div>

                    <!-- Remove -->
                    <button class="text-sm text-red-500 hover:text-red-700">Hapus</button>

                </div>
            </div>

            <!-- ITEM 2 -->
            <div class="border border-gray-200 rounded-xl p-6 hover:border-gray-300 transition">
                <div class="flex flex-col md:flex-row gap-6">

                    <div class="w-24 h-24 bg-gray-100 rounded-xl flex-shrink-0 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=300"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="flex-1">
                        <p class="text-sm font-medium mb-1">Track Jacket Blue Stripe</p>
                        <p class="text-xs text-gray-500 mb-3">Size: M</p>

                        <div class="flex items-center gap-6">
                            <div class="flex items-center gap-3">
                                <button class="w-8 h-8 border border-gray-300 flex items-center justify-center hover:border-gray-500 transition">-</button>
                                <span class="text-sm font-medium">1</span>
                                <button class="w-8 h-8 border border-gray-300 flex items-center justify-center hover:border-gray-500 transition">+</button>
                            </div>

                            <p class="text-sm font-medium">Rp 300.000</p>
                        </div>
                    </div>

                    <button class="text-sm text-red-500 hover:text-red-700">Hapus</button>

                </div>
            </div>

        </div>

        <!-- SUMMARY -->
        <div class="mt-12 max-w-md ml-auto border border-gray-200 rounded-xl p-6">
            <h2 class="text-lg font-light mb-4">Ringkasan Belanja</h2>

            <div class="flex justify-between text-sm mb-2">
                <span>Subtotal</span>
                <span>Rp 525.000</span>
            </div>

            <div class="flex justify-between text-sm mb-2">
                <span>Ongkir</span>
                <span>Rp 20.000</span>
            </div>

            <div class="border-t border-gray-200 my-4"></div>

            <div class="flex justify-between text-sm font-medium mb-6">
                <span>Total</span>
                <span>Rp 545.000</span>
            </div>

            <a href="/checkout" class="block text-center bg-gray-900 text-white w-full py-3 text-sm hover:bg-gray-800 transition rounded-lg">
                Lanjutkan ke Checkout
            </a>
        </div>

    </div>
</section>

@endsection