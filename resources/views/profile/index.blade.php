@extends('homepage.index')
@section('content')
<!-- PROFILE HEADER -->
<section class="pt-24 pb-12 border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-start md:items-center gap-6">

            <!-- Avatar -->
            <div class="w-20 h-20 rounded-full bg-gray-100 flex items-center justify-center text-2xl font-light text-gray-600">
                AS
            </div>

            <!-- User Info -->
            <div class="flex-1">
                <h1 class="text-2xl font-light tracking-tight mb-1">Ahmad Santoso</h1>
                <p class="text-sm text-gray-500">ahmad.santoso@email.com</p>
            </div>

            <!-- Edit Button -->
            <button class="text-sm text-gray-700 hover:text-gray-900 border border-gray-200 px-6 py-2 hover:border-gray-400 transition">
                Edit Profile
            </button>

        </div>
    </div>
</section>

<!-- TABS -->
<section class="border-b border-gray-100 sticky top-16 bg-white z-40">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">
        <div class="flex gap-8">
            <button onclick="showTab('account')" id="tab-account"
                class="py-4 text-sm font-medium border-b-2 border-gray-900 transition">
                Informasi Akun
            </button>

            <button onclick="showTab('orders')" id="tab-orders"
                class="py-4 text-sm font-medium text-gray-500 border-b-2 border-transparent hover:text-gray-900 transition">
                Histori Pembelian
            </button>
        </div>
    </div>
</section>

<!-- CONTENT -->
<section class="py-12">
    <div class="max-w-7xl mx-auto px-6 lg:px-8">

        <!-- ACCOUNT INFO -->
        <div id="content-account" class="tab-content">
            <div class="max-w-2xl">
                <h2 class="text-xl font-light mb-8">Informasi Pribadi</h2>

                <div class="space-y-6">

                    <!-- Nama -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Nama Depan</label>
                            <p class="text-sm text-gray-900 py-2 border-b border-gray-200">
                                Ahmad
                            </p>
                        </div>
                        <div>
                            <label class="block text-sm text-gray-600 mb-1">Nama Belakang</label>
                            <p class="text-sm text-gray-900 py-2 border-b border-gray-200">
                                Santoso
                            </p>
                        </div>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Email</label>
                        <p class="text-sm text-gray-900 py-2 border-b border-gray-200">
                            ahmad.santoso@email.com
                        </p>
                    </div>

                    <!-- Telepon -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Nomor Telepon</label>
                        <p class="text-sm text-gray-900 py-2 border-b border-gray-200">
                            0812-3456-7890
                        </p>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">Alamat</label>
                        <p class="text-sm text-gray-900 py-3 border border-gray-200 bg-gray-50">
                            Jl. Sudirman No. 123, Purwokerto, Jawa Tengah 53116
                        </p>
                    </div>

                    <!-- Button Edit -->
                    <div class="pt-4">
                        <button class="border border-gray-300 px-8 py-3 text-sm hover:border-gray-500 transition">
                            Edit Profil
                        </button>
                    </div>

                </div>
            </div>
        </div>


        <!-- ORDER HISTORY -->
        <div id="content-orders" class="tab-content hidden">
            <h2 class="text-xl font-light mb-8">Histori Pembelian</h2>

            <div class="space-y-4">

                <!-- Order Item -->
                <div class="border border-gray-200 p-6 hover:border-gray-300 transition">

                    <!-- Header -->
                    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-4">
                        <div>
                            <p class="text-sm text-gray-500 mb-1">Order #ORD-2024-001</p>
                            <p class="text-sm font-medium">15 November 2024</p>
                        </div>

                        <div class="flex items-center gap-4">
                            <span class="text-sm px-3 py-1 bg-green-50 text-green-700 border border-green-200">Selesai</span>
                            <p class="text-sm font-medium">Rp 450.000</p>
                        </div>
                    </div>

                    <!-- Product List -->
                    <div class="border-t border-gray-100 pt-4 space-y-3">

                        <div class="flex gap-4">
                            <div class="w-16 h-16 bg-gray-100 flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?w=200"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium mb-1">Polo Shirt Premium Navy</p>
                                <p class="text-xs text-gray-500">Size: L · Qty: 2</p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div class="w-16 h-16 bg-gray-100 flex-shrink-0">
                                <img src="https://images.unsplash.com/photo-1551028719-00167b16eac5?w=200"
                                    class="w-full h-full object-cover">
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium mb-1">Track Jacket Blue Stripe</p>
                                <p class="text-xs text-gray-500">Size: M · Qty: 1</p>
                            </div>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-4 pt-4 border-t border-gray-100 flex gap-3">
                        <button class="flex-1 text-sm border border-gray-200 py-2 hover:border-gray-400 transition">
                            Lihat Detail
                        </button>
                        <button class="flex-1 text-sm bg-gray-900 text-white py-2 hover:bg-gray-800 transition">
                            Beli Lagi
                        </button>
                    </div>

                </div>

            </div>

            <div class="mt-8 text-center">
                <button class="text-sm text-gray-600 hover:text-gray-900 border border-gray-200 px-8 py-3 hover:border-gray-400 transition">
                    Muat Lebih Banyak
                </button>
            </div>

        </div>

    </div>
</section>

<!-- SCRIPT TAB -->
<script>
    function showTab(tab) {
        document.querySelectorAll('.tab-content').forEach(el => el.classList.add('hidden'));
        document.getElementById('content-' + tab).classList.remove('hidden');

        document.querySelectorAll('[id^="tab-"]').forEach(el => {
            el.classList.remove('border-gray-900');
            el.classList.add('text-gray-500');
        });

        document.getElementById('tab-' + tab).classList.add('border-gray-900');
        document.getElementById('tab-' + tab).classList.remove('text-gray-500');
    }
</script>

@endsection