<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tiket Saya
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if ($tickets->isEmpty())
                <div class="bg-white rounded-lg shadow p-8 text-center text-gray-500">
                    Belum ada tiket
                </div>
            @else
                <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <table class="min-w-full text-sm">
                        <thead class="bg-gray-100 text-gray-700">
                            <tr>
                                <th class="px-4 py-3 text-left">Kode Tiket</th>
                                <th class="px-4 py-3 text-left">Hotel</th>
                                <th class="px-4 py-3 text-left">Kamar</th>
                                <th class="px-4 py-3 text-left">Tanggal</th>
                                <th class="px-4 py-3 text-left">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y">
                            @foreach ($tickets as $ticket)
                                <tr>
                                    <td class="px-4 py-3 font-medium">
                                        {{ $ticket->ticket_code }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $ticket->booking->room->hotel->nama_hotel ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ $ticket->booking->room->nama_kamar ?? '-' }}
                                    </td>

                                    <td class="px-4 py-3">
                                        {{ \Carbon\Carbon::parse($ticket->check_in)->format('d M Y') }}
                                        -
                                        {{ \Carbon\Carbon::parse($ticket->check_out)->format('d M Y') }}
                                    </td>

                                    <td class="px-4 py-3">
                                        <a href="{{ route('tickets.show', $ticket) }}"
                                           class="inline-block bg-green-600 hover:bg-green-700
                                                  text-white px-3 py-1 rounded text-xs">
                                            Lihat Detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

        </div>
    </div>
</x-app-layout>
