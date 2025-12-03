<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Y-Beutik — Modern Beutik</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap"
    rel="stylesheet" />
  <style>
    * {
      font-family: "Inter", sans-serif;
    }

    body {
      letter-spacing: -0.01em;
    }

    .nav-link {
      position: relative;
    }

    .nav-link::after {
      content: "";
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 1px;
      background: currentColor;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 8px;
      height: 8px;
    }

    ::-webkit-scrollbar-track {
      background: #f1f1f1;
    }

    ::-webkit-scrollbar-thumb {
      background: #c1c1c1;
      border-radius: 4px;
    }

    ::-webkit-scrollbar-thumb:hover {
      background: #a1a1a1;
    }

    /* Firefox Scrollbar */
    * {
      scrollbar-width: thin;
      scrollbar-color: #c1c1c1 #f1f1f1;
    }
  </style>
</head>

<body class="bg-white text-gray-900 antialiased">
  <!-- Navbar -->
  @include('homepage.layouts.navbar')

  <!-- Hero Section -->
  <section class="pt-16">
    <div class="relative h-[85vh] bg-gray-100">
      <img
        src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=1600"
        alt="Hero"
        class="w-full h-full object-cover" />
      <div class="absolute inset-0 bg-black/10"></div>
      <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center text-white px-6">
          <p class="text-sm tracking-widest mb-4 font-light">KOLEKSI 2024</p>
          <h1 class="text-5xl md:text-7xl font-light mb-8 tracking-tight">
            Gaya Minimalis
          </h1>
          <a href="/product"
            class="bg-white text-gray-900 px-8 py-3 text-sm tracking-wide hover:bg-gray-100 transition">
            JELAJAHI
          </a>
        </div>
      </div>
    </div>
  </section>


  <!-- Categories Section -->
  <section id="categories" class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
    <h2 class="text-center text-3xl font-light tracking-tight mb-6">
      Kategori Produk
    </h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
      @if($categories->isEmpty())
      <p class="text-center text-gray-500 col-span-full">Tidak ada kategori yang tersedia.</p>
      @else
      @foreach ($categories as $category)
      <a
        href="{{ route('categories.show', $category->slug) }}"
        class="group relative overflow-hidden bg-gray-100 aspect-[3/4] rounded-xl">

        <img src="{{ $category->image ? Storage::url($category->image) : 'https://via.placeholder.com/600x800?text=No+Image' }}"
          alt="{{ $category->name }}"
          class="w-full h-full object-cover group-hover:scale-105 transition duration-700" />


        <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>

        <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
          <h3 class="text-2xl font-light mb-2">{{ $category->name }}</h3>
          <p class="text-sm opacity-90">Koleksi Lengkap →</p>
        </div>
      </a>
      @endforeach
      @endif
    </div>
  </section>

  <!-- Featured Products Section -->
  <section id="featured-products" class="max-w-7xl mx-auto px-6 lg:px-8 py-10 border-t border-gray-100">
    <h2 class="text-center text-3xl font-light tracking-tight mb-4">
      Produk kami
    </h2>
    <div class="text-center mb-5">
      <a href="{{ route('products.index') }}" class="text-sm hover:underline">
        Lihat Semua
      </a>
    </div>

    <!-- Grid Produk -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-12">
      @forelse($products as $product)
      <div class="group">
        <a href="{{ route('products.show', $product->slug) }}"
          class="block relative overflow-hidden bg-gray-50 aspect-[3/4] mb-4 rounded-xl overflow-hidden">
          <img src="{{ $product->main_image ? Storage::url($product->main_image) : 'https://via.placeholder.com/500x600?text=No+Image' }}"
            alt="{{ $product->name }}"
            class="w-full h-full object-cover group-hover:scale-105 transition duration-700" />
        </a>
        <div class="space-y-1">
          <p class="text-xs text-gray-500 uppercase">{{ $product->category->name ?? 'Uncategorized' }}</p>
          <h3 class="text-sm font-medium">{{ $product->name }}</h3>
          <p class="text-sm text-gray-500">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
        </div>
      </div>
      @empty
      <p class="col-span-full text-center text-gray-500">Produk tidak tersedia.</p>
      @endforelse
    </div>

    <!-- Pagination -->
    @if($products instanceof \Illuminate\Pagination\LengthAwarePaginator)
    <div class="mt-6 flex justify-center">
      {{ $products->links() }}
    </div>
    @endif
  </section>


  <!-- About Section -->
  <section id="about" class="bg-gray-100 py-24">
    <div class="max-w-5xl mx-auto px-6 lg:px-8 text-center">
      <h2 class="text-3xl font-light tracking-tight mb-6">
        Tentang Y-Beutik
      </h2>
      <p class="text-gray-600 leading-relaxed max-w-2xl mx-auto mb-8">
        Sejak 2015, kami menghadirkan koleksi pakaian berkualitas dengan
        desain minimalis dan timeless. Setiap produk dipilih dengan cermat
        untuk memastikan kenyamanan dan gaya yang tahan lama.
      </p>
      <div class="grid grid-cols-3 gap-12 max-w-3xl mx-auto mt-16">
        <div>
          <p class="text-3xl font-light mb-2">10+</p>
          <p class="text-sm text-gray-500">Tahun Pengalaman</p>
        </div>
        <div>
          <p class="text-3xl font-light mb-2">50K+</p>
          <p class="text-sm text-gray-500">Pelanggan Puas</p>
        </div>
        <div>
          <p class="text-3xl font-light mb-2">500+</p>
          <p class="text-sm text-gray-500">Produk Tersedia</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section id="contact"
    class="max-w-7xl mx-auto px-6 lg:px-8 py-24 border-t border-gray-100">
    <div class="max-w-xl mx-auto">
      <div class="text-center mb-12">
        <h2 class="text-2xl font-light tracking-tight mb-4">Hubungi Kami</h2>
        <p class="text-sm text-gray-600">
          Ada pertanyaan? Kami siap membantu Anda
        </p>
      </div>

      <div class="space-y-4">
        <div>
          <label class="block text-sm text-gray-700 mb-2">Nama Lengkap</label>
          <input
            type="text"
            placeholder="Masukkan nama Anda"
            class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400 rounded-xl" />
        </div>
        <div>
          <label class="block text-sm text-gray-700 mb-2">Email</label>
          <input
            type="email"
            placeholder="email@example.com"
            class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400 rounded-xl" />
        </div>
        <div>
          <label class="block text-sm text-gray-700 mb-2">Nomor Telepon</label>
          <input
            type="tel"
            placeholder="08xx-xxxx-xxxx"
            class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400 rounded-xl" />
        </div>
        <div>
          <label class="block text-sm text-gray-700 mb-2">Pesan</label>
          <textarea
            rows="5"
            placeholder="Tulis pesan Anda..."
            class="w-full px-4 py-3 border border-gray-200 text-sm focus:outline-none focus:border-gray-400 resize-none rounded-xl"></textarea>
        </div>
        <button
          class="w-full bg-gray-900 text-white py-3 text-sm hover:bg-gray-800 transition rounded-xl">
          Kirim Pesan
        </button>
      </div>
    </div>
  </section>

  <!-- Footer -->
  @include('homepage.layouts.footer')

  <script>
    document.getElementById("menuBtn").addEventListener("click", function() {
      document.getElementById("mobileMenu").classList.toggle("hidden");
    });
  </script>
</body>

</html>