<nav
  class="fixed top-0 w-full bg-gray-50 backdrop-blur-sm z-50 border-b border-gray-100">
  <div class="max-w-7xl mx-auto px-6 lg:px-8">
    <div class="flex items-center justify-between h-16">
      <!-- Logo -->
      <a href="/#hero" class="text-xl font-light tracking-tight">Y-Beutik</a>

      <!-- Desktop Menu -->
      <div class="hidden md:flex items-center space-x-8">
        <a
          href="/#hero"
          class="nav-link text-sm text-gray-700 hover:text-gray-900">Beranda</a>
        <a
          href="/#categories"
          class="nav-link text-sm text-gray-700 hover:text-gray-900">Kategori</a>
        <a
          href="/#featured-products"
          class="nav-link text-sm text-gray-700 hover:text-gray-900">Produk</a>
        <a
          href="/#about"
          class="nav-link text-sm text-gray-700 hover:text-gray-900">Tentang</a>
        <a
          href="/#contact"
          class="nav-link text-sm text-gray-700 hover:text-gray-900">Kontak</a>
      </div>

      <div class="flex items-center space-x-6">
        <a href="/#profile" class="hidden md:block text-gray-700 hover:text-gray-900">
          <svg
          class="w-5 h-5"
          fill="none"
          stroke="currentColor"
          viewBox="0 0 24 24">
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1.5"
            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
          </svg>
        </a>
        <a href="{{ route('cart.index') }}" class=":block text-gray-700 hover:text-gray-900">
          <svg
            class="w-5 h-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.5"
              d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
          </svg>
        </a>
        <!-- icon profile -->
        <a href="/profile" class="hidden md:block text-gray-700 hover:text-gray-900">
          <svg
            class="w-5 h-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.5"
              d="M5.121 17.804A9 9 0 1118.88 6.196M12 12a3 3 0 110-6 3 3 0 010 6zm0 0c-2.21 0-4 1.79-4 4v1h8v-1c0-2.21-1.79-4-4-4z" />
          </svg>
        </a>


        <button id="menuBtn" class="md:hidden text-gray-700">
          <svg
            class="w-5 h-5"
            fill="none"
            stroke="currentColor"
            viewBox="0 0 24 24">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="1.5"
              d="M4 6h16M4 12h16M4 18h16"></path>
          </svg>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div

    id="mobileMenu"
    class="hidden md:hidden border-t border-gray-100 bg-white">
    <div class="px-6 py-4 space-y-3">
      <a href="/profile" class="block text-sm text-gray-700">Profil</a>
      <a href="/" class="block text-sm text-gray-700">Beranda</a>
      <a href="/#categories" class="block text-sm text-gray-700">Kategori</a>
      <a href="/#featured-products" class="block text-sm text-gray-700">Produk</a>
      <a href="/#about" class="block text-sm text-gray-700">Tentang</a>
      <a href="/#contact" class="block text-sm text-gray-700">Kontak</a>
    </div>
  </div>
</nav>