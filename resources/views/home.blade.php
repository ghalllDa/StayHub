<x-app-layout>

<!-- ================= HERO SECTION ================= -->
<section class="relative h-[85vh] flex items-center justify-center overflow-hidden">

    <!-- BACKGROUND IMAGE -->
    <img
        src="https://images.unsplash.com/photo-1566073771259-6a8506099945"
        class="absolute inset-0 w-full h-full object-cover scale-105"
        alt="Hotel Background"
    >

    <!-- OVERLAY -->
    <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-600/60"></div>

    <!-- CONTENT -->
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-white text-center">

        <h1 class="text-5xl font-bold mb-4 animate-fade-up">
            Booking Hotel & Penginapan Murah
        </h1>

        <p class="mb-8 text-lg opacity-90 animate-fade-up delay-150">
            Temukan hotel terbaik dengan harga promo
        </p>

        <!-- BUTTONS -->
        <div class="flex justify-center gap-6 mt-8 animate-fade-up delay-300">

            <!-- LOGIN BUTTON -->
            <a href="{{ route('login') }}"
               class="relative inline-flex items-center justify-center
                      px-10 py-3 overflow-hidden font-semibold text-blue-700
                      bg-white rounded-xl shadow-lg
                      group hover:scale-105 transition-all duration-300">

                <!-- SHINE -->
                <span class="absolute inset-0 bg-gradient-to-r
                             from-transparent via-white/70 to-transparent
                             -translate-x-full group-hover:translate-x-full
                             transition-transform duration-700"></span>

                <span class="relative z-10">
                    Login
                </span>
            </a>

            <!-- REGISTER BUTTON -->
            <a href="{{ route('register') }}"
               class="relative inline-flex items-center justify-center
                      px-10 py-3 overflow-hidden font-semibold text-white
                      bg-orange-500 rounded-xl shadow-lg
                      group hover:scale-105 transition-all duration-300">

                <!-- SHINE -->
                <span class="absolute inset-0 bg-gradient-to-r
                             from-transparent via-white/40 to-transparent
                             -translate-x-full group-hover:translate-x-full
                             transition-transform duration-700"></span>

                <span class="relative z-10">
                    Register
                </span>
            </a>

        </div>
    </div>
</section>

<!-- ================= VALUE SECTION ================= -->
    <section class="bg-white py-20 mt-24">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-14">
                <h2 class="text-3xl font-bold text-blue-700 mb-3">
                    Kenapa Memilih StayHub?
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Kami hadir untuk memberikan pengalaman booking hotel
                    yang lebih mudah, aman, dan nyaman untuk semua orang.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <!-- ITEM 1 -->
                <div class="bg-white rounded-2xl shadow-lg p-8
                        hover:shadow-xl transition text-center">
                    <div class="text-4xl mb-4">⚡</div>
                    <h4 class="font-semibold text-lg mb-2">
                        Proses Cepat
                    </h4>
                    <p class="text-gray-600 text-sm">
                        Booking hotel hanya dalam beberapa langkah
                        tanpa proses yang rumit.
                    </p>
                </div>

                <!-- ITEM 2 -->
                <div class="bg-white rounded-2xl shadow-lg p-8
                        hover:shadow-xl transition text-center">
                    <div class="text-4xl mb-4">🔒</div>
                    <h4 class="font-semibold text-lg mb-2">
                        Aman & Terpercaya
                    </h4>
                    <p class="text-gray-600 text-sm">
                        Data dan transaksi kamu dilindungi
                        dengan sistem keamanan terbaik.
                    </p>
                </div>

                <!-- ITEM 3 -->
                <div class="bg-white rounded-2xl shadow-lg p-8
                        hover:shadow-xl transition text-center">
                    <div class="text-4xl mb-4">🏨</div>
                    <h4 class="font-semibold text-lg mb-2">
                        Pilihan Lengkap
                    </h4>
                    <p class="text-gray-600 text-sm">
                        Ribuan hotel dan penginapan di seluruh
                        Indonesia tersedia untuk kamu.
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
                    StaylHub
                </h2>

                <p class="leading-relaxed">
                    StayHub adalah platform booking hotel yang membantu kamu
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
                    <p>📧 support@stayhub.id</p>
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

                <p>© 2026 StayHub. All rights reserved.</p>

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

</x-app-layout>