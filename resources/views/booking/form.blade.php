<x-app-layout>

    <!-- ================= MAIN ================= -->
    <div class="py-12 bg-blue-50 min-h-screen">
        <div class="max-w-6xl mx-auto px-6">

            <!-- JUDUL -->
            <h1 class="text-3xl font-bold text-gray-800 mb-10">
                Booking Kamar
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                <!-- FORM BOOKING -->
                <div class="md:col-span-2 bg-white rounded-lg shadow p-8">
                    <h2 class="text-xl font-semibold mb-6 text-gray-800">
                        Detail Pemesanan
                    </h2>

                    <form action="{{ route('booking.createPayment') }}" method="POST" class="space-y-5">
                        @csrf
                        <input type="hidden" name="room_id" value="{{ $room->id }}">

                        <!-- CHECK IN -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Tanggal Check-in
                            </label>
                            <input type="date" name="check_in" min="{{ date('Y-m-d') }}" required
                                class="w-full mt-1 border border-gray-300 rounded px-4 py-2">
                        </div>

                        <!-- CHECK OUT -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Tanggal Check-out
                            </label>
                            <input type="date" name="check_out" min="{{ date('Y-m-d', strtotime('+1 day')) }}" required
                                class="w-full mt-1 border border-gray-300 rounded px-4 py-2">
                        </div>

                        <!-- JUMLAH TAMU -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Jumlah Tamu
                            </label>
                            <input type="number" name="jumlah_tamu" min="1" required
                                class="w-full mt-1 border border-gray-300 rounded px-4 py-2">
                        </div>

                        <!-- NAMA -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Nama Pemesan
                            </label>
                            <input type="text" name="nama_pemesan" required
                                class="w-full mt-1 border border-gray-300 rounded px-4 py-2">
                        </div>

                        <!-- NO HP -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                No. HP
                            </label>
                            <input type="text" name="no_hp" required
                                class="w-full mt-1 border border-gray-300 rounded px-4 py-2">
                        </div>

                        <!-- CATATAN -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Catatan (opsional)
                            </label>
                            <textarea name="catatan"
                                class="w-full mt-1 border border-gray-300 rounded px-4 py-2"></textarea>
                        </div>

                        <!-- SUBMIT -->
                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700
                                       text-white py-3 rounded font-semibold">
                            Konfirmasi & Lanjut ke Pembayaran
                        </button>
                    </form>
                </div>

                <!-- RINGKASAN -->
                <div class="bg-white rounded-lg shadow p-6 h-fit">
                    <h2 class="text-lg font-semibold mb-4">
                        Ringkasan Kamar
                    </h2>

                    @php
                        $roomImg = $room->gambar && file_exists(public_path('images/' . $room->gambar))
                            ? asset('images/' . $room->gambar)
                            : asset('images/no-image.png');
                    @endphp

                    <img src="{{ $roomImg }}" class="w-full h-40 object-cover rounded mb-4"
                        alt="Foto {{ $room->nama_kamar }}">

                    <p class="font-semibold text-gray-800">
                        {{ $room->hotel->nama_hotel }}
                    </p>

                    <p class="text-sm text-gray-500">
                        {{ $room->hotel->lokasi }}
                    </p>

                    <hr class="my-4">

                    <p class="font-medium text-gray-800">
                        {{ $room->nama_kamar }}
                    </p>

                    <ul class="text-sm text-gray-600 list-disc list-inside mt-2">
                        @foreach ($room->fasilitas as $f)
                            <li>{{ $f }}</li>
                        @endforeach
                    </ul>

                    <p class="text-sm text-gray-500 mt-2">
                        Kapasitas: {{ $room->capacity }} orang
                    </p>

                    <hr class="my-4">

                    <p class="text-sm text-gray-500">Harga / malam</p>
                    <p class="text-2xl font-bold text-orange-600">
                        Rp {{ number_format($room->harga, 0, ',', '.') }}
                    </p>
                </div>
             </div><!-- END GRID -->

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