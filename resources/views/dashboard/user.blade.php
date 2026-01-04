<x-app-layout>

    <!-- ================= MAIN CONTENT ================= -->
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-slate-100 to-blue-200 py-10">

        <!-- MAIN CARD -->
        <div class="max-w-7xl mx-auto
                    bg-white/80 backdrop-blur-xl
                    border border-white/40
                    rounded-3xl shadow-2xl
                    p-8">

            <h1 class="text-3xl font-extrabold text-blue-700 mb-6 tracking-wide">
                Penginapan StayHub
            </h1>

            <!-- HERO -->
            <div class="relative rounded-3xl overflow-hidden mb-10">

                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945"
                    class="absolute inset-0 w-full h-full object-cover" alt="Hotel Hero">

                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60"></div>

                <div class="relative z-10 px-8 py-16 text-white">
                    <h1 class="text-4xl font-bold mb-3">
                        Booking Hotel & Penginapan Murah
                    </h1>
                    <p class="text-blue-100 mb-8 max-w-xl">
                        Temukan hotel terbaik dengan harga promo & lokasi strategis
                    </p>

                    <!-- SEARCH CARD -->
                    <div class="bg-white/90 backdrop-blur
                                rounded-2xl shadow-xl
                                p-5 text-gray-700
                                grid grid-cols-1 md:grid-cols-5 gap-3">

                        <input type="text" id="keyword" placeholder="Kota / Hotel"
                            class="border rounded-xl px-3 py-2 col-span-2">

                        <input type="date" class="border rounded-xl px-3 py-2">

                        <input type="date" class="border rounded-xl px-3 py-2">

                        <input type="number" placeholder="Tamu" class="border rounded-xl px-3 py-2">

                        <button id="btnCari" class="bg-orange-500 hover:bg-orange-600
                                       text-white rounded-xl px-4 py-2 font-semibold">
                            Cari
                        </button>
                    </div>
                </div>
            </div>

            <!-- LIST -->
            <div>
                <h2 class="text-2xl font-bold text-gray-800 mb-6">
                    Hasil Pencarian Hotel
                </h2>

                <div id="hotel-list" class="grid grid-cols-1 md:grid-cols-4 gap-8"></div>
            </div>
        </div>
    </div>


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




    {{-- DATA DARI CONTROLLER (TIDAK DIUBAH) --}}
    <script>
        window.initialHotels = @json($hotels);
        window.bookmarkedHotelIds = @json($bookmarkedHotelIds);
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {

            const list = document.getElementById('hotel-list');

            function renderHotels(data) {
                list.innerHTML = '';

                if (!data.length) {
                    list.innerHTML =
                        `<p class="col-span-4 text-center text-gray-500">
                            Hotel tidak ditemukan
                         </p>`;
                    return;
                }

                data.forEach(hotel => {
                    const saved = window.bookmarkedHotelIds.includes(hotel.id);

                    list.innerHTML += `
                        <div class="bg-white/90 backdrop-blur rounded-2xl shadow-lg overflow-hidden">

                            <img src="${hotel.images?.length > 0
                            ? '/images/' + hotel.images[0].path
                            : '/img/no-image.png'
                        }" class="w-full h-44 object-cover" alt="${hotel.nama_hotel}">


                            <div class="p-5">

                        <!-- NAMA + BINTANG + BOOKMARK -->
                            <div class="mb-2 flex justify-between items-start">

                        <!-- KIRI: NAMA + BINTANG + LOKASI -->
                            <div>
                            <div class="flex items-center gap-2">
                                <h3 class="font-bold text-lg text-gray-800">
                                ${hotel.nama_hotel}
                                </h3>

                        <!-- BINTANG HOTEL -->
                            ${Number(hotel.stars) > 0
                            ? `<div class="flex text-yellow-400 text-sm leading-none">
                            ${'★'.repeat(Number(hotel.stars))}
                            </div>`
                            : ''
                        }
                 </div>

        <!-- LOKASI -->
        <p class="text-sm text-gray-500">
            ${hotel.lokasi ?? ''}
        </p>
    </div>

    <!-- KANAN: BOOKMARK -->
    <button
        class="bookmark-btn ${saved ? 'saved' : ''}"
        data-id="${hotel.id}">
        <svg width="18" height="18" viewBox="0 0 24 24">
            <path
                d="M6 2h12v20l-6-3-6 3V2z"
                stroke="currentColor"
                stroke-width="1.5"
                fill="currentColor"/>
        </svg>
    </button>

</div>
                    

                                <p class="text-orange-600 font-bold mt-2">
                                    Rp ${Number(hotel.harga).toLocaleString('id-ID')} / malam
                                </p>

                                <a href="/hotels/${hotel.id}"
                                   class="block mt-4 bg-blue-600 text-white text-center py-2 rounded-xl">
                                    Lihat Detail
                                </a>
                            </div>
                        </div>
                    `;
                });
            }

            renderHotels(window.initialHotels);

            document.getElementById('btnCari').addEventListener('click', function () {
                const keyword = document
                    .getElementById('keyword')
                    .value
                    .trim()
                    .toLowerCase();

                const filtered = window.initialHotels.filter(hotel => {
                    const nama = (hotel.nama_hotel || '').toLowerCase();
                    const lokasi = (hotel.lokasi || '').toLowerCase();

                    return nama.includes(keyword) || lokasi.includes(keyword);
                });

                renderHotels(filtered);
            });

            document.addEventListener('click', function (e) {
                const btn = e.target.closest('.bookmark-btn');
                if (!btn) return;

                const hotelId = btn.dataset.id;
                const isSaved = btn.classList.contains('saved');

                fetch(`/hotels/${hotelId}/bookmark`, {
                    method: isSaved ? 'DELETE' : 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document
                            .querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                    .then(res => res.json())
                    .then(() => {
                        btn.classList.toggle('saved');

                        if (btn.classList.contains('saved')) {
                            window.bookmarkedHotelIds.push(parseInt(hotelId));
                        } else {
                            window.bookmarkedHotelIds =
                                window.bookmarkedHotelIds.filter(id => id !== parseInt(hotelId));
                        }
                    });
            });

        });
    </script>

    <!-- STYLE BOOKMARK (TIDAK DIUBAH) -->
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

</x-app-layout>