<!-- auth.blade.php - Layout Utama untuk Auth -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Auth - Y-Beutik</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet" />
    <style>
        * {
            font-family: "Inter", sans-serif;
        }
        body {
            letter-spacing: -0.01em;
        }
        .input-field {
            transition: all 0.3s ease;
        }
        .input-field:focus {
            transform: translateY(-2px);
        }
    </style>
</head>
<body class="bg-gray-50 antialiased">
    <div class="min-h-screen flex">
        <!-- Left Side - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-12">
            <div class="w-full max-w-md">
                <!-- Logo -->
                <div class="mb-8">
                    <a href="/" class="inline-block">
                        <h1 class="text-2xl font-light tracking-tight text-gray-900">Y-Beutik</h1>
                    </a>
                </div>

                <!-- Content -->
                @yield('content')

                <!-- Footer Links -->
                <div class="mt-8 pt-6 border-t border-gray-200">
                    <p class="text-center text-xs text-gray-500">
                        © 2025 Y-Beutik. All rights reserved.
                    </p>
                </div>
            </div>
        </div>

        <!-- Right Side - Image/Branding -->
        <div class="hidden lg:block lg:w-1/2 relative bg-gray-900">
            <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?w=1200" 
                 alt="Fashion" 
                 class="absolute inset-0 w-full h-full object-cover opacity-90" />
            <div class="absolute inset-0 bg-gradient-to-br from-black/60 to-black/40"></div>
            
            <!-- Overlay Content -->
            <div class="relative h-full flex flex-col justify-between p-12 text-white">
                <div>
                    <div class="inline-flex items-center space-x-2 mb-6">
                        <div class="h-px w-12 bg-white/60"></div>
                        <span class="text-xs tracking-[0.25em] uppercase font-light">Koleksi 2024</span>
                    </div>
                    <h2 class="text-4xl font-light leading-tight mb-4">
                        Gaya yang<br/>Bercerita
                    </h2>
                    <p class="text-white/80 font-light max-w-md">
                        Bergabunglah dengan ribuan pelanggan yang telah mempercayai Y-Beutik untuk kebutuhan fashion mereka.
                    </p>
                </div>

                <!-- Stats -->
                <div class="flex gap-8">
                    <div>
                        <div class="text-2xl font-light mb-1">500+</div>
                        <div class="text-xs text-white/60 uppercase tracking-wider">Produk</div>
                    </div>
                    <div class="h-12 w-px bg-white/20"></div>
                    <div>
                        <div class="text-2xl font-light mb-1">1000+</div>
                        <div class="text-xs text-white/60 uppercase tracking-wider">Pelanggan</div>
                    </div>
                    <div class="h-12 w-px bg-white/20"></div>
                    <div>
                        <div class="text-2xl font-light mb-1">4.9/5</div>
                        <div class="text-xs text-white/60 uppercase tracking-wider">Rating</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>