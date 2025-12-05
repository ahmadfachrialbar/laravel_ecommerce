<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout — Y-Beutik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <style>
        * { font-family: "Inter", sans-serif; }
        html { scroll-behavior: smooth; }
        body { letter-spacing: -0.01em; }
        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #c1c1c1; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #a1a1a1; }
        * { scrollbar-width: thin; scrollbar-color: #c1c1c1 #f1f1f1; }
    </style>
</head>

<body class="bg-gray-50 antialiased">

    <!-- Header -->
    <header class="bg-white border-b border-gray-200 py-4 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 flex items-center justify-between">
            <a href="#" class="text-xl font-light tracking-tight">Y-Beutik</a>
            <div class="flex items-center gap-8">
                <div class="hidden md:flex items-center gap-2 text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-full bg-gray-900 text-white flex items-center justify-center text-xs">1</div>
                        <span class="text-gray-900">Checkout</span>
                    </div>
                    <div class="w-8 h-px bg-gray-300"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">2</div>
                        <span>Konfirmasi pesanan</span>
                    </div>
                    <div class="w-8 h-px bg-gray-300"></div>
                    <div class="flex items-center gap-2">
                        <div class="w-6 h-6 rounded-full bg-gray-200 flex items-center justify-center text-xs">3</div>
                        <span>Pembayaran</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="py-8 md:py-12">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-12">

                <!-- Left Column - Form -->
                <div class="lg:col-span-7">

                    <form action="{{ route('checkout.store') }}" method="POST">
                        @csrf

                        <!-- Informasi Pengiriman -->
                        <div class="bg-white p-6 md:p-8 border border-gray-200 mb-6">
                            <h2 class="text-lg font-medium mb-6">Informasi Pengiriman</h2>

                            <div class="space-y-4">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-2">Nama Depan</label>
                                        <input type="text" name="first_name" value="{{ old('first_name') }}" placeholder="Ahmad" class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400" required />
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-2">Nama Belakang</label>
                                        <input type="text" name="last_name" value="{{ old('last_name') }}" placeholder="Santoso" class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400" required />
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm text-gray-600 mb-2">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" placeholder="email@example.com" class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400" required />
                                </div>

                                <div>
                                    <label class="block text-sm text-gray-600 mb-2">Nomor Telepon</label>
                                    <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="08xx-xxxx-xxxx" class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400" required />
                                </div>

                                <div>
                                    <label class="block text-sm text-gray-600 mb-2">Alamat Lengkap</label>
                                    <textarea name="address" rows="3" placeholder="Jl. Nama Jalan No. XX" class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400 resize-none" required>{{ old('address') }}</textarea>
                                </div>

                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-2">Kota</label>
                                        <input type="text" name="city" value="{{ old('city') }}" placeholder="Purwokerto" class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400" required />
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-2">Provinsi</label>
                                        <input type="text" name="province" value="{{ old('province') }}" placeholder="Jawa Tengah" class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400" required />
                                    </div>
                                    <div>
                                        <label class="block text-sm text-gray-600 mb-2">Kode Pos</label>
                                        <input type="text" name="postal_code" value="{{ old('postal_code') }}" placeholder="53116" class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400" required />
                                    </div>
                                </div>

                                <div>
                                    <label class="block text-sm text-gray-600 mb-2">Catatan Pesanan (Opsional)</label>
                                    <textarea name="notes" rows="2" placeholder="Catatan untuk kurir atau penjual" class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400 resize-none">{{ old('notes') }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Metode Pengiriman -->
                        <div class="bg-white p-6 md:p-8 border border-gray-200 mb-6">
                            <h2 class="text-lg font-medium mb-6">Metode Pengiriman</h2>

                            <div class="space-y-3">
                                <label class="flex items-center justify-between p-4 border border-gray-200 cursor-pointer hover:border-gray-400 transition">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="shipping" value="reguler" checked class="w-4 h-4" />
                                        <div>
                                            <p class="text-sm font-medium">Reguler (3-5 hari)</p>
                                            <p class="text-xs text-gray-500">Estimasi tiba: 8-10 Des 2024</p>
                                        </div>
                                    </div>
                                    <span class="text-sm font-medium">Rp 15.000</span>
                                </label>

                                <label class="flex items-center justify-between p-4 border border-gray-200 cursor-pointer hover:border-gray-400 transition">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="shipping" value="express" class="w-4 h-4" />
                                        <div>
                                            <p class="text-sm font-medium">Express (1-2 hari)</p>
                                            <p class="text-xs text-gray-500">Estimasi tiba: 4-5 Des 2024</p>
                                        </div>
                                    </div>
                                    <span class="text-sm font-medium">Rp 35.000</span>
                                </label>

                                <label class="flex items-center justify-between p-4 border border-gray-200 cursor-pointer hover:border-gray-400 transition">
                                    <div class="flex items-center gap-3">
                                        <input type="radio" name="shipping" value="sameday" class="w-4 h-4" />
                                        <div>
                                            <p class="text-sm font-medium">Same Day (Hari ini)</p>
                                            <p class="text-xs text-gray-500">Estimasi tiba: Hari ini sebelum 21:00</p>
                                        </div>
                                    </div>
                                    <span class="text-sm font-medium">Rp 50.000</span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="w-full bg-gray-900 text-white py-4 text-sm font-medium hover:bg-gray-800 transition mb-3">
                            Buat Pesanan
                        </button>

                        <a href="/cart" class="block w-full border border-gray-200 py-3 text-sm text-center hover:border-gray-400 transition">
                            Kembali ke Keranjang
                        </a>

                    </form>
                </div>

                <!-- Right Column - Order Summary -->
                <div class="lg:col-span-5">
                    <div class="bg-white p-6 md:p-8 border border-gray-200 sticky top-24">
                        <h2 class="text-lg font-medium mb-6">Ringkasan Pesanan</h2>

                        <!-- Products -->
                        <div class="space-y-4 mb-6 pb-6 border-b border-gray-200">
                            @forelse($cart as $item)
                                <div class="flex gap-4">
                                    <div class="w-20 h-20 bg-gray-100 flex-shrink-0">
                                        <img src="{{ $item->product->main_image ? Storage::url($item->product->main_image) : 'https://via.placeholder.com/150' }}" alt="{{ $item->product->name }}" class="w-full h-full object-cover" />
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-sm font-medium mb-1">{{ $item->product->name }}</h3>
                                        <p class="text-xs text-gray-500 mb-2">Size: {{ $item->size }} · Qty: {{ $item->qty }}</p>
                                        <p class="text-sm font-medium">Rp {{ number_format($item->product->price * $item->qty, 0, ',', '.') }}</p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-sm text-gray-500">Keranjang kosong.</p>
                            @endforelse
                        </div>

                        <!-- Price Details -->
                        @php
                            $shipping_cost = 0;
                            if(request()->old('shipping') === 'express') $shipping_cost = 35000;
                            elseif(request()->old('shipping') === 'sameday') $shipping_cost = 50000;
                            else $shipping_cost = 15000;

                            $total = $subtotal + $shipping_cost;
                        @endphp

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Subtotal ({{ $cart->sum('qty') }} item)</span>
                                <span class="font-medium">Rp {{ number_format($subtotal,0,',','.') }}</span>
                            </div>
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">Ongkos Kirim</span>
                                <span class="font-medium">Rp {{ number_format($shipping_cost,0,',','.') }}</span>
                            </div>
                            <div class="flex justify-between text-sm text-green-600">
                                <span>Diskon</span>
                                <span>- Rp 0</span>
                            </div>
                        </div>

                        <!-- Total -->
                        <div class="pt-6 border-t border-gray-200 mb-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-lg font-medium">Total</span>
                                <span class="text-2xl font-medium">Rp {{ number_format($total,0,',','.') }}</span>
                            </div>
                            <p class="text-xs text-gray-500">Sudah termasuk PPN</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

</body>

</html>
