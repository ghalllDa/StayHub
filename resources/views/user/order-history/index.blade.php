<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Riwayat Pesanan
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($orders->isEmpty())
                <div class="bg-white rounded-lg shadow p-8 text-center text-gray-500">
                    Belum ada riwayat pesanan
                </div>
            @else
                <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">Kode Booking</th>
                                <th class="px-4 py-3 text-left">Hotel</th>
                                <th class="px-4 py-3 text-left">Kamar</th>
                                <th class="px-4 py-3 text-left">Tanggal</th>
                                <th class="px-4 py-3 text-left">Total</th>
                                <th class="px-4 py-3 text-left">Status</th>
                                <th class="px-4 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y">
                            @foreach ($orders as $order)
                                @php
                                    $status = strtolower($order->status);
                                @endphp

                                <tr>
                                    <td class="px-4 py-3">
                                        {{ $order->transaction_id ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $order->hotel->nama_hotel ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $order->room->nama_kamar ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ \Carbon\Carbon::parse($order->check_in)->format('d M Y') }}
                                        -
                                        {{ \Carbon\Carbon::parse($order->check_out)->format('d M Y') }}
                                    </td>

                                    <td class="px-4 py-3 font-semibold text-orange-600">
                                        Rp {{ number_format($order->total_harga, 0, ',', '.') }}
                                    </td>

                                    <td class="px-4 py-3">
                                        @if ($status === 'pending')
                                            <span class="px-2 py-1 text-xs rounded bg-yellow-100 text-yellow-700">
                                                Menunggu Pembayaran
                                            </span>
                                        @elseif ($status === 'paid')
                                            <span class="px-2 py-1 text-xs rounded bg-blue-100 text-blue-700">
                                                Menunggu Konfirmasi Admin
                                            </span>
                                        @elseif ($status === 'approved')
                                            <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                                                Disetujui
                                            </span>
                                        @elseif ($status === 'rejected')
                                            <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-700">
                                                Ditolak
                                            </span>
                                        @elseif ($status === 'completed')
                                            <span class="px-2 py-1 text-xs rounded bg-gray-200 text-gray-700">
                                                Selesai
                                            </span>
                                        @else
                                            <span class="px-2 py-1 text-xs rounded bg-gray-100 text-gray-600">
                                                Unknown
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-4 py-3 space-y-1">
    {{-- LIHAT TIKET --}}
    @if ($status === 'approved' && $order->ticket)
        <a href="{{ route('tickets.show', $order->ticket->id) }}"
           class="inline-block bg-green-600 hover:bg-green-700
                  text-white px-3 py-1 rounded text-xs">
            Lihat Tiket
        </a>
    @endif

    {{-- REVIEW HOTEL (HANYA APPROVED) --}}
    @if ($status === 'approved')
        @if (!$order->review)
            <a href="{{ route('reviews.create', $order->id) }}"
               class="inline-block bg-yellow-500 hover:bg-yellow-600
                      text-white px-3 py-1 rounded text-xs">
                Review Hotel
            </a>
        @else
            <span class="inline-block bg-gray-200 text-gray-600
                         px-3 py-1 rounded text-xs">
                Sudah Direview
            </span>
        @endif
    @endif

    @if ($status !== 'approved')
        -
    @endif
</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>

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
