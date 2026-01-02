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
                            <input type="date" name="check_in"
                                   min="{{ date('Y-m-d') }}"
                                   required
                                   class="w-full mt-1 border border-gray-300 rounded px-4 py-2">
                        </div>

                        <!-- CHECK OUT -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Tanggal Check-out
                            </label>
                            <input type="date" name="check_out"
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                   required
                                   class="w-full mt-1 border border-gray-300 rounded px-4 py-2">
                        </div>

                        <!-- JUMLAH TAMU -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Jumlah Tamu
                            </label>
                            <input type="number" name="jumlah_tamu" min="1"
                                   required
                                   class="w-full mt-1 border border-gray-300 rounded px-4 py-2">
                        </div>

                        <!-- NAMA -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Nama Pemesan
                            </label>
                            <input type="text" name="nama_pemesan"
                                   required
                                   class="w-full mt-1 border border-gray-300 rounded px-4 py-2">
                        </div>

                        <!-- NO HP -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                No. HP
                            </label>
                            <input type="text" name="no_hp"
                                   required
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
                        <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700
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

                    @if($room->gambar)
                        <img src="{{ asset('storage/' . $room->gambar) }}"
                             class="w-full h-40 object-cover rounded mb-4">
                    @endif

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
                        Kapasitas: {{ $room->kapasitas }} orang
                    </p>

                    <hr class="my-4">

                    <p class="text-sm text-gray-500">Harga / malam</p>
                    <p class="text-2xl font-bold text-orange-600">
                        Rp {{ number_format($room->harga, 0, ',', '.') }}
                    </p>
                </div>

            </div>
        </div>
    </div>

 

<!-- ================= VALUE SECTION ================= -->
<section class="bg-white py-20 mt-24">
    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-14 animate-fade-up">
            <h2 class="text-3xl font-bold text-blue-700 mb-3">
                Kenapa Memilih HotelHub?
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                Kami hadir untuk memberikan pengalaman booking hotel
                yang lebih mudah, aman, dan nyaman.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

            <!-- CARD -->
            <div class="bg-white rounded-2xl shadow-lg p-8 text-center
                        hover:-translate-y-3 hover:shadow-2xl
                        active:scale-95 cursor-pointer
                        transition-all duration-300 group">
                <div class="text-4xl mb-4 group-hover:scale-110 transition">
                    ⚡
                </div>
                <h4 class="font-semibold text-lg mb-2">
                    Proses Cepat
                </h4>
                <p class="text-gray-600 text-sm">
                    Booking hotel hanya dalam beberapa langkah.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-8 text-center
                        hover:-translate-y-3 hover:shadow-2xl
                        active:scale-95 cursor-pointer
                        transition-all duration-300 group">
                <div class="text-4xl mb-4 group-hover:scale-110 transition">
                    🔒
                </div>
                <h4 class="font-semibold text-lg mb-2">
                    Aman & Terpercaya
                </h4>
                <p class="text-gray-600 text-sm">
                    Sistem keamanan terbaik untuk kamu.
                </p>
            </div>

            <div class="bg-white rounded-2xl shadow-lg p-8 text-center
                        hover:-translate-y-3 hover:shadow-2xl
                        active:scale-95 cursor-pointer
                        transition-all duration-300 group">
                <div class="text-4xl mb-4 group-hover:scale-110 transition">
                    🏨
                </div>
                <h4 class="font-semibold text-lg mb-2">
                    Pilihan Lengkap
                </h4>
                <p class="text-gray-600 text-sm">
                    Ribuan hotel di seluruh Indonesia.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- ================= FOOTER ================= -->
<footer class="bg-white border-t mt-24">
    <div class="max-w-7xl mx-auto px-6 py-14
                grid grid-cols-1 md:grid-cols-3 gap-12 text-gray-600">

        <div>
            <h2 class="text-2xl font-bold text-blue-700 mb-4">
                HotelHub
            </h2>
            <p>
                Platform booking hotel dengan pengalaman premium.
            </p>
        </div>

        <div>
            <h4 class="font-semibold text-gray-800 mb-4">
                Layanan
            </h4>
            <ul class="space-y-2">
                <li class="hover:text-blue-600 transition cursor-pointer">Booking Hotel</li>
                <li class="hover:text-blue-600 transition cursor-pointer">Promo</li>
                <li class="hover:text-blue-600 transition cursor-pointer">Bantuan</li>
            </ul>
        </div>

        <div>
            <h4 class="font-semibold text-gray-800 mb-4">
                Kontak
            </h4>
            <p>📧 support@hotelhub.id</p>
            <p>📞 +62 587-6655-4420</p>
        </div>

    </div>

    <div class="border-t text-center py-6 text-sm text-gray-500">
        © 2026 HotelHub. All rights reserved.
    </div>
</footer>
</x-app-layout>