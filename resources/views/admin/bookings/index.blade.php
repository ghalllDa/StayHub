<x-app-layout>
    {{-- BACKGROUND --}}
    <div class="min-h-screen bg-gradient-to-br from-gray-50 via-gray-100 to-gray-50">

        <div class="max-w-7xl mx-auto px-6 py-10">

            {{-- HEADER --}}
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-800 flex items-center gap-2">
                    📋 Daftar Pesanan
                </h1>
                <p class="text-sm text-gray-500 mt-1">
                    Kelola dan verifikasi pesanan kamar hotel
                </p>
            </div>

            {{-- STAT CARDS --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-10">
                <div class="bg-white rounded-xl shadow p-6">
                    <p class="text-sm text-gray-500">Total Pesanan</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">
                        {{ $bookings->count() }}
                    </p>
                </div>

                <div class="bg-white rounded-xl shadow p-6">
                    <p class="text-sm text-gray-500">Pesanan Disetujui</p>
                    <p class="text-3xl font-bold text-green-600 mt-2">
                        {{ $bookings->where('status','approved')->count() }}
                    </p>
                </div>
            </div>

            {{-- TABLE CARD --}}
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">

                <div class="overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-50 border-b">
                            <tr class="uppercase text-xs text-gray-500 tracking-wide">
                                <th class="px-6 py-4 text-left">Nama</th>
                                <th class="px-6 py-4 text-left">Hotel</th>
                                <th class="px-6 py-4 text-left">Kamar</th>
                                <th class="px-6 py-4 text-left">Total</th>
                                <th class="px-6 py-4 text-center">Status</th>
                                <th class="px-6 py-4 text-center">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @forelse($bookings as $booking)
                                <tr class="hover:bg-gray-50 transition">
                                    <td class="px-6 py-4 font-semibold text-gray-800">
                                        {{ $booking->nama_pemesan }}
                                    </td>

                                    <td class="px-6 py-4 text-gray-600">
                                        {{ $booking->room->hotel->nama_hotel ?? '-' }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <span class="inline-flex px-3 py-1 rounded-full text-xs font-medium bg-blue-50 text-blue-700">
                                            {{ $booking->room->nama_kamar ?? '-' }}
                                        </span>
                                    </td>

                                    <td class="px-6 py-4 font-bold text-gray-800">
                                        Rp {{ number_format($booking->total_harga, 0, ',', '.') }}
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        @if($booking->status === 'approved')
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-700">
                                                APPROVED
                                            </span>
                                        @elseif($booking->status === 'paid')
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-700">
                                                PAID
                                            </span>
                                        @else
                                            <span class="px-3 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-700">
                                                {{ strtoupper($booking->status) }}
                                            </span>
                                        @endif
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        @if($booking->status === 'paid')
                                            <div class="flex justify-center gap-2">
                                                <form method="POST"
                                                      action="{{ route('admin.bookings.approve', $booking->id) }}">
                                                    @csrf
                                                    <button
                                                        class="px-4 py-1.5 text-xs font-semibold bg-green-600 text-white rounded-lg hover:bg-green-700 transition">
                                                        Terima
                                                    </button>
                                                </form>

                                                <form method="POST"
                                                      action="{{ route('admin.bookings.reject', $booking->id) }}">
                                                    @csrf
                                                   
                                                </form>
                                            </div>
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-14 text-gray-500">
                                        Belum ada pesanan
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
