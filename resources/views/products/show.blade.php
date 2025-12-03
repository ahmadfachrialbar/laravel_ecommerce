@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-6 lg:px-8 py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Gambar Produk -->
        <div>
            <img src="{{ $product->main_image ? Storage::url($product->main_image) : 'https://via.placeholder.com/600x800?text=No+Image' }}"
                 alt="{{ $product->name }}"
                 class="w-full h-full object-cover rounded-xl" />
        </div>

        <!-- Informasi Produk -->
        <div class="space-y-4">
            <h1 class="text-2xl font-semibold">{{ $product->name }}</h1>
            <p class="text-gray-500 text-sm">{{ $product->category->name ?? 'Uncategorized' }}</p>
            <p class="text-xl font-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
            <p class="text-gray-700">{{ $product->description ?? '-' }}</p>

            <!-- Pilihan Size -->
            @if($product->size)
            <div>
                <label class="block text-sm font-medium mb-1">Size:</label>
                <select name="size" id="size" class="border rounded-md p-2 w-full">
                    @foreach(json_decode($product->size) as $size)
                        <option value="{{ $size }}">{{ $size }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <!-- Pilihan Color -->
            @if($product->color)
            <div>
                <label class="block text-sm font-medium mb-1">Color:</label>
                <select name="color" id="color" class="border rounded-md p-2 w-full">
                    @foreach(json_decode($product->color) as $color)
                        <option value="{{ $color }}">{{ $color }}</option>
                    @endforeach
                </select>
            </div>
            @endif

            <!-- Stok -->
            <p class="text-gray-600">Stok: {{ $product->stock }}</p>

            <!-- Button Masukkan Keranjang -->
            <form action="" method="POST">
                @csrf
                <button type="submit"
                    class="mt-4 bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition">
                    Masukkan ke Keranjang
                </button>
            </form>
        </div>
    </div>

    <!-- Produk Lainnya -->
    <div class="mt-12">
        <h2 class="text-xl font-semibold mb-4">Produk Lainnya di Kategori Sama</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
            @forelse($relatedProducts as $item)
            <div class="group">
                <a href="{{ route('products.show', $item->slug) }}" class="block relative overflow-hidden bg-gray-50 aspect-[3/4] mb-4 rounded-xl">
                    <img src="{{ $item->main_image ? Storage::url($item->main_image) : 'https://via.placeholder.com/600x800?text=No+Image' }}"
                         alt="{{ $item->name }}"
                         class="w-full h-full object-cover group-hover:scale-105 transition duration-700" />
                </a>
                <div class="space-y-1">
                    <p class="text-xs text-gray-500 uppercase">{{ $item->category->name ?? 'Uncategorized' }}</p>
                    <h3 class="text-sm font-medium">{{ $item->name }}</h3>
                    <p class="text-sm text-gray-500">Rp {{ number_format($item->price,0,",",".") }}</p>
                </div>
            </div>
            @empty
            <p class="col-span-full text-gray-500">Tidak ada produk terkait.</p>
            @endforelse
        </div>
    </div>
</div>
@endsection
