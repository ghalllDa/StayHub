<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Tiket
        </h2>
    </x-slot>

    <div class="py-12 bg-blue-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-lg shadow p-6 space-y-3">
                <div>
                    <span class="text-gray-500 text-sm">Kode Tiket</span>
                    <p class="font-semibold">{{ $ticket->ticket_code }}</p>
                </div>

                <div>
                    <span class="text-gray-500 text-sm">Hotel</span>
                    <p class="font-semibold">
                        {{ $ticket->booking->room->hotel->nama_hotel }}
                    </p>
                </div>

                <div>
                    <span class="text-gray-500 text-sm">Kamar</span>
                    <p class="font-semibold">
                        {{ $ticket->booking->room->nama_kamar }}
                    </p>
                </div>

                <div>
                    <span class="text-gray-500 text-sm">Tanggal Menginap</span>
                    <p class="font-semibold">
                        {{ \Carbon\Carbon::parse($ticket->check_in)->format('d M Y') }}
                        -
                        {{ \Carbon\Carbon::parse($ticket->check_out)->format('d M Y') }}
                    </p>
                </div>
            </div>

            <div class="mt-4">
                <a href="{{ route('tickets.index') }}"
                   class="text-blue-600 hover:underline">
                    ← Kembali ke Tiket Saya
                </a>
            </div>

        </div>
    </div>
</x-app-layout>

