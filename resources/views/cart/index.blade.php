@extends('homepage.index') {{-- Asumsi layout utama Anda adalah homepage.index --}}

@section('content')

<section class="pt-24 pb-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <h1 class="text-2xl font-light tracking-tight mb-8">Keranjang Belanja</h1>

        <!-- CART ITEMS -->
        <div class="space-y-6">

            @forelse ($items as $item)
            <div class="border border-gray-200 rounded-xl p-6 hover:border-gray-300 transition">
                <div class="flex flex-col md:flex-row gap-6">

                    <!-- PRODUCT IMAGE -->
                    <div class="w-24 h-24 bg-gray-100 rounded-xl flex-shrink-0 overflow-hidden">
                        <img src="{{ $item->product->main_image ? asset('storage/' . $item->product->main_image) : 'https://via.placeholder.com/150' }}"
                            class="w-full h-full object-cover">
                    </div>

                    <!-- PRODUCT INFO -->
                    <div class="flex-1">
                        <p class="text-sm font-medium mb-1">
                            {{ $item->product->name }}
                        </p>

                        {{-- Jika nanti ada size/color tinggal aktifkan --}}

                        <div class="flex items-center gap-6">

                            <!-- QTY CONTROL -->
                            <div class="flex items-center gap-3">
                                <!-- Decrease -->
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="quantity" value="{{ max(1, $item->quantity - 1) }}">
                                    <button type="submit"
                                        class="w-8 h-8 border border-gray-300 flex items-center justify-center hover:border-gray-500 transition
            {{ $item->quantity <= 1 ? 'opacity-50 cursor-not-allowed' : '' }}"
                                        {{ $item->quantity <= 1 ? 'disabled' : '' }}>
                                        -
                                    </button>
                                </form>

                                <span class="text-sm font-medium">{{ $item->quantity }}</span>

                                <!-- Increase -->
                                <form action="{{ route('cart.update', $item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                    <button type="submit"
                                        class="w-8 h-8 border border-gray-300 flex items-center justify-center hover:border-gray-500 transition">
                                        +
                                    </button>
                                </form>
                            </div>


                            <!-- PRICE -->
                            <p class="text-sm font-medium">
                                Rp {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>

                    <!-- REMOVE BUTTON -->
                    <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-500 hover:text-red-700">
                            Hapus
                        </button>
                    </form>

                </div>
            </div>
            @empty
            <p class="text-sm text-gray-500">Keranjang masih kosong.</p>
            @endforelse

        </div>

        <!-- SUMMARY -->
        @if ($items->count())
        @php
        $subtotal = $items->sum(fn($i) => $i->product->price * $i->quantity);
        $shipping = 0; // Bisa disesuaikan atau diambil dari config
        $total = $subtotal + $shipping;
        @endphp

        <div class="mt-12 max-w-md ml-auto border border-gray-200 rounded-xl p-6">
            <h2 class="text-lg font-light mb-4">Ringkasan Belanja</h2>

            <div class="flex justify-between text-sm mb-2">
                <span>Subtotal</span>
                <span>Rp {{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>

            <div class="flex justify-between text-sm mb-2">
                <span>Ongkir</span>
                <span class="text-red-500">Belum dihitung</span>
            </div>

            <div class="border-t border-gray-200 my-4"></div>

            <div class="flex justify-between text-sm font-medium mb-6">
                <span>Total</span>
                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
            </div>

            <a href="/checkout"
                class="block text-center bg-gray-900 text-white w-full py-3 text-sm hover:bg-gray-800 transition rounded-lg">
                Lanjutkan ke Checkout
            </a>
        </div>
        @endif

    </div>
</section>

@endsection