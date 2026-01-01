<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login | Blue Ocean Hotel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">

<!-- ================= LOGIN SECTION ================= -->
<section class="relative min-h-screen flex items-center justify-center">

    <!-- BACKGROUND -->
    <img
        src="https://images.unsplash.com/photo-1566073771259-6a8506099945"
        class="absolute inset-0 w-full h-full object-cover"
        alt="Hotel Background"
    >
    <div class="absolute inset-0 bg-black/60"></div>

    <!-- LOGIN CARD -->
    <div class="relative z-10 w-full max-w-md bg-white/95 backdrop-blur
                rounded-3xl shadow-2xl px-10 py-12">

        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-blue-700">HotelHub</h1>
            <p class="text-gray-500 mt-2">Please sign in to your account</p>
        </div>

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <div>
                <label class="text-sm font-medium text-gray-700">Email Address</label>
                <input type="email" name="email" required
                       class="mt-1 w-full rounded-xl border-gray-300 px-4 py-3">
            </div>

            <div>
                <label class="text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" required
                       class="mt-1 w-full rounded-xl border-gray-300 px-4 py-3">
            </div>

            <div class="flex justify-between text-sm">
                <label class="flex items-center">
                    <input type="checkbox" class="rounded">
                    <span class="ml-2">Remember me</span>
                </label>

                <a href="{{ route('password.request') }}" class="text-blue-600">
                    Forgot password?
                </a>
            </div>

            <button class="w-full py-3 bg-blue-700 text-white rounded-xl font-semibold">
                Login
            </button>
        </form>
    </div>
</section>

<!-- ================= SUBSCRIBE SECTION ================= -->
<section class="bg-white py-12">
    <div class="max-w-5xl mx-auto bg-blue-500 rounded-2xl px-8 py-10 text-white">

        <h2 class="text-2xl font-bold mb-2">
            Suscríbete y entérate de nuestras ofertas
        </h2>
        <p class="text-blue-100">
            Recibirás las mejores promociones y descuentos a tu email.
        </p>

    </div>
</section>

<!-- ================= VALUE SECTION ================= -->
    <section class="bg-white py-20 mt-24">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-14">
                <h2 class="text-3xl font-bold text-blue-700 mb-3">
                    Kenapa Memilih HotelHub?
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Kami hadir untuk memberikan pengalaman booking hotel
                    yang lebih mudah, aman, dan nyaman untuk semua orang.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:-translate-y-1 transition">
                    <div class="text-4xl mb-4">⚡</div>
                    <h4 class="font-semibold text-lg mb-2">Proses Cepat</h4>
                    <p class="text-gray-600 text-sm">
                        Booking hotel hanya dalam beberapa langkah.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:-translate-y-1 transition">
                    <div class="text-4xl mb-4">🔒</div>
                    <h4 class="font-semibold text-lg mb-2">Aman & Terpercaya</h4>
                    <p class="text-gray-600 text-sm">
                        Data dan transaksi kamu terlindungi.
                    </p>
                </div>

                <div class="bg-white rounded-2xl shadow-lg p-8 text-center hover:-translate-y-1 transition">
                    <div class="text-4xl mb-4">🏨</div>
                    <h4 class="font-semibold text-lg mb-2">Pilihan Lengkap</h4>
                    <p class="text-gray-600 text-sm">
                        Ribuan hotel di seluruh Indonesia.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= FOOTER ================= -->
    <footer class="bg-white border-t mt-24">
        <div class="max-w-7xl mx-auto px-6 py-16
                    grid grid-cols-1 md:grid-cols-3 gap-12 text-gray-600">

            <!-- LEFT -->
            <div>
                <h2 class="text-2xl font-bold text-blue-700 mb-4">
                    HotelHub
                </h2>

                <p class="leading-relaxed">
                    HotelHub adalah platform booking hotel yang membantu kamu
                    menemukan penginapan terbaik dengan proses cepat, aman,
                    dan nyaman di seluruh Indonesia.
                </p>

                <p class="italic text-sm text-gray-400 mt-4">
                    Making your stay easier, one booking at a time.
                </p>

                <button class="mt-6 px-6 py-2 text-blue-700 border border-blue-200
                               rounded-xl hover:bg-blue-50 transition">
                    Tentang Tim Kami
                </button>
            </div>

            <!-- MIDDLE -->
            <div>
                <h4 class="font-semibold text-gray-800 mb-4">
                    Layanan
                </h4>

                <ul class="space-y-2">
                    <li class="hover:text-blue-600 transition cursor-pointer">
                        Booking Hotel
                    </li>
                    <li class="hover:text-blue-600 transition cursor-pointer">
                        Promo & Diskon
                    </li>
                    <li class="hover:text-blue-600 transition cursor-pointer">
                        Bantuan Pelanggan
                    </li>
                </ul>
            </div>

            <!-- RIGHT -->
            <div>
                <h4 class="font-semibold text-gray-800 mb-4">
                    Help Center
                </h4>

                <div class="space-y-3">
                    <p>📧 support@hotelhub.id</p>
                    <p>📞 +62 587-6655-4420</p>
                    <p>📍 Bandung, Indonesia</p>
                </div>
            </div>

        </div>

        <!-- BOTTOM -->
        <div class="border-t">
            <div class="max-w-7xl mx-auto px-6 py-6
                        flex flex-col md:flex-row
                        justify-between items-center
                        text-sm text-gray-500">

                <p>© 2026 HotelHub. All rights reserved.</p>

                <div class="flex gap-6 mt-3 md:mt-0">
                    <a href="#" class="hover:text-blue-600 transition">
                        Privacy Policy
                    </a>
                    <a href="#" class="hover:text-blue-600 transition">
                        Terms of Service
                    </a>
                </div>
            </div>
        </div>
    </footer>

</body>
</html>
