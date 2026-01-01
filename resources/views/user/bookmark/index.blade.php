<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Hotel Tersimpan
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">


            @if($hotels->count() === 0)
                <div class="bg-white rounded-lg shadow p-8 text-center text-gray-500">
                    Belum ada hotel yang disimpan
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    @foreach($hotels as $hotel)
                        <div class="bg-white rounded-lg shadow hotel-card" data-id="{{ $hotel->id }}">

                            <img
                                src="{{ $hotel->images->first()
                                    ? asset('storage/' . $hotel->images->first()->path)
                                    : asset('img/no-image.png') }}"
                                class="w-full h-40 object-cover rounded-t-lg">

                            <div class="p-4">

                                <!-- NAMA + LOKASI + BOOKMARK (SAMA DENGAN DASHBOARD) -->
                                <div class="flex justify-between items-start gap-2">
                                    <div>
                                        <h4 class="font-semibold text-lg">
                                            {{ $hotel->nama_hotel }}
                                        </h4>

                                        <p class="text-sm text-gray-500">
                                            {{ $hotel->lokasi }}
                                        </p>
                                    </div>

                                    <!-- BOOKMARK BUTTON -->
                                    <button
                                        class="bookmark-btn saved"
                                        data-id="{{ $hotel->id }}"
                                        title="Hapus dari simpanan">
                                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none">
                                            <path
                                                d="M6 2h12v20l-6-3-6 3V2z"
                                                stroke="currentColor"
                                                stroke-width="1.5"
                                                fill="currentColor"
                                            />
                                        </svg>
                                    </button>
                                </div>

                                <p class="mt-3 font-bold text-orange-600">
                                    Rp {{ number_format($hotel->harga,0,',','.') }} / malam
                                </p>

                                <a href="/hotels/{{ $hotel->id }}"
                                   class="block mt-4 text-center bg-blue-600 text-white py-2 rounded">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- SCRIPT BOOKMARK (UNSAVE + REMOVE CARD) -->
    <script>
        document.addEventListener('click', function (e) {
            const btn = e.target.closest('.bookmark-btn');
            if (!btn) return;

            const hotelId = btn.dataset.id;
            const card = btn.closest('.hotel-card');

            fetch(`/hotels/${hotelId}/bookmark`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json'
                }
            })
            .then(res => res.json())
            .then(() => {
                card.remove();
            });
        });
    </script>

    <!-- STYLE BOOKMARK (SAMA DENGAN DASHBOARD) -->
    <style>
        .bookmark-btn {
            background: white;
            border-radius: 9999px;
            padding: 6px;
            border: 1px solid #e5e7eb;
            cursor: pointer;
        }

        .bookmark-btn svg {
            color: #9ca3af;
        }

        .bookmark-btn.saved svg {
            color: #ef4444;
        }
    </style>

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
</x-app-layout>
