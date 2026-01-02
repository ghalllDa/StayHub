<x-app-layout>

    <!-- ================= MAIN CONTENT ================= -->
    <div class="min-h-screen bg-gradient-to-br from-blue-100 via-slate-100 to-blue-200 py-12">

        <div class="max-w-7xl mx-auto
                    bg-white/80 backdrop-blur-xl
                    border border-white/40
                    rounded-3xl shadow-2xl
                    p-8">

            <!-- HEADER HOTEL -->
            <div class="mb-4">
                <div class="flex items-center gap-3">
                    <h1 class="text-3xl font-bold text-gray-800">
                        {{ $hotel->nama_hotel }}
                    </h1>

                    {{-- BINTANG HOTEL --}}
                    @if ($hotel->stars)
                        <div class="flex text-xl">
                            @for ($i = 1; $i <= $hotel->stars; $i++)
                                <span class="text-yellow-400">★</span>
                            @endfor
                        </div>
                    @endif
                </div>

                {{-- LOKASI --}}
                <p class="text-gray-500 mt-1">
                    {{ $hotel->lokasi }}
                </p>
            </div>

            <!-- GALERI FOTO -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
                @forelse ($hotel->images as $img)
                    @php
                        $hotelImg = $img->path && file_exists(public_path('images/' . $img->path))
                                     ? asset('images/' . $img->path)
                                     : asset('images/no-image.png');
                    @endphp
                    <img src="{{ $hotelImg }}"
                         class="rounded-2xl object-cover h-64 w-full shadow"
                         alt="Foto {{ $hotel->nama_hotel }}">
                @empty
                    <img src="{{ asset('images/no-image.png') }}"
                         class="rounded-2xl object-cover h-64 w-full shadow"
                         alt="No image">
                @endforelse
            </div>

            <!-- CARD HARGA -->
            <div class="bg-white/90 backdrop-blur
                        rounded-2xl shadow-lg
                        p-6 mb-10
                        flex flex-col md:flex-row
                        justify-between items-center">

                <div>
                    <p class="text-gray-500 text-sm">Mulai dari</p>
                    <p class="text-3xl font-extrabold text-orange-600">
                        Rp {{ number_format($hotel->harga, 0, ',', '.') }} / malam
                    </p>
                </div>

                <a href="#kamar"
                   class="mt-4 md:mt-0
                          bg-orange-500 hover:bg-orange-600
                          text-white px-8 py-3
                          rounded-xl font-bold shadow transition">
                    Pilih Kamar
                </a>
            </div>

            <!-- DESKRIPSI -->
            <div class="bg-white/90 backdrop-blur rounded-2xl shadow p-6 mb-8">
                <h2 class="text-2xl font-bold mb-3">Deskripsi Hotel</h2>
                <p class="text-gray-600 leading-relaxed">
                    {{ $hotel->deskripsi }}
                </p>
            </div>

            <!-- REVIEW HOTEL -->
            <div class="bg-white rounded-lg shadow p-6 mb-8">
                <h2 class="text-xl font-bold mb-4">Review Hotel</h2>

                @php
                    $avgRating = round($hotel->reviews->avg('rating'), 1);
                    $totalReview = $hotel->reviews->count();
                @endphp

                @if ($totalReview > 0)
                    <div class="flex items-center gap-4 mb-6">
                        <div class="text-4xl font-bold text-orange-500">{{ $avgRating }}</div>
                        <div>
                            <div class="flex text-xl">
                                @for ($i = 1; $i <= 5; $i++)
                                    <span class="{{ $i <= round($avgRating) ? 'text-yellow-400' : 'text-gray-300' }}">★</span>
                                @endfor
                            </div>
                            <p class="text-sm text-gray-500">Dari {{ $totalReview }} review</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        @foreach ($hotel->reviews->take(3) as $review)
                            <div class="border rounded-lg p-4">
                                <div class="flex justify-between items-center mb-1">
                                    <p class="font-semibold text-gray-800">{{ $review->user->name }}</p>
                                    <div class="text-yellow-400 text-sm">
                                        @for ($i = 1; $i <= $review->rating; $i++) ★ @endfor
                                    </div>
                                </div>
                                @if ($review->comment)
                                    <p class="text-gray-600 text-sm">{{ $review->comment }}</p>
                                @endif
                            </div>
                        @endforeach
                    </div>

                    @if ($totalReview > 3)
                        <p class="mt-4 text-sm text-gray-500">Menampilkan 3 review terbaru</p>
                    @endif
                @else
                    <p class="text-gray-500">Belum ada review untuk hotel ini.</p>
                @endif
            </div>

            <!-- FASILITAS -->
            <div class="bg-white/90 backdrop-blur rounded-2xl shadow p-6 mb-8">
                <h2 class="text-2xl font-bold mb-4">Fasilitas</h2>
                <ul class="grid grid-cols-2 md:grid-cols-3 gap-2 text-gray-600">
                    @foreach (explode(',', $hotel->fasilitas) as $f)
                        <li class="flex items-center gap-2">
                            <span class="text-green-600">✔</span> {{ $f }}
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- KAMAR -->
            <div id="kamar" class="bg-white/90 backdrop-blur rounded-2xl shadow p-6 mb-8">
                <h2 class="text-2xl font-bold mb-6">Kamar Tersedia</h2>

                @if ($hotel->rooms->where('status', 'tersedia')->count() === 0)
                    <p class="text-gray-500">Tidak ada kamar tersedia</p>
                @else
                    <div class="space-y-6">
                        @foreach ($hotel->rooms as $room)
                            @if ($room->status === 'tersedia')
                                @php
                                    $promo = $room->promos->first();
                                    $hargaDiskon = $promo ? $room->harga - ($room->harga * $promo->diskon / 100) : null;
                                    $roomImg = $room->gambar && file_exists(public_path('images/' . $room->gambar))
                                               ? asset('images/' . $room->gambar)
                                               : asset('images/no-image.png');
                                @endphp

                                <div class="relative border rounded-2xl p-5 flex flex-col md:flex-row gap-6 hover:shadow-lg transition">

                                    @if($promo)
                                        <span class="absolute top-4 right-4
                                                     bg-red-600 text-white
                                                     text-xs font-bold
                                                     px-4 py-1 rounded-full">
                                            Promo {{ $promo->diskon }}%
                                        </span>
                                    @endif

                                    <!-- FOTO KAMAR -->
                                    <div class="w-full md:w-48 h-40 flex-shrink-0">
                                        <img src="{{ $roomImg }}"
                                             class="w-full h-40 object-cover rounded-lg"
                                             alt="Foto {{ $room->nama_kamar }}">
                                    </div>

                                    <!-- INFO KAMAR -->
                                    <div class="flex flex-col md:flex-row justify-between w-full gap-4">
                                        <div>
                                            <h3 class="text-xl font-bold text-gray-800">{{ $room->nama_kamar }}</h3>
                                            <ul class="text-sm text-gray-600 list-disc list-inside">
                                                @foreach ($room->fasilitas as $f)
                                                    <li>{{ $f }}</li>
                                                @endforeach
                                            </ul>
                                            <p class="text-sm text-gray-500 mt-1">Kapasitas: {{ $room->capacity ?? '-' }} orang</p>
                                        </div>

                                        <div class="text-right">
                                            @if($promo)
                                                <p class="text-sm text-gray-400 line-through">Rp {{ number_format($room->harga, 0, ',', '.') }}</p>
                                                <p class="text-orange-600 font-bold text-xl">Rp {{ number_format($hargaDiskon, 0, ',', '.') }}</p>
                                            @else
                                                <p class="text-orange-600 font-bold text-xl">Rp {{ number_format($room->harga, 0, ',', '.') }}</p>
                                            @endif
                                            <p class="text-xs text-gray-500 mb-2">/ malam</p>

                                            <a href="{{ route('booking.form', $room->id) }}"
                                               class="inline-block bg-blue-600 hover:bg-blue-700
                                                      text-white px-5 py-2 rounded-xl font-semibold">
                                                Pilih Kamar
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>

            <!-- MAP -->
            <div class="bg-white/90 backdrop-blur rounded-2xl shadow p-6 mb-8">
                <h2 class="text-2xl font-bold mb-4">Lokasi Hotel</h2>
                <div id="map" class="w-full h-96 rounded-2xl"></div>
            </div>

        </div>
    </div>

    <!-- LEAFLET -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    <script>
        const map = L.map('map').setView([{{ $hotel->latitude }}, {{ $hotel->longitude }}], 15);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap'
        }).addTo(map);

        L.marker([{{ $hotel->latitude }}, {{ $hotel->longitude }}])
            .addTo(map)
            .bindPopup("{{ $hotel->nama_hotel }}")
            .openPopup();
    </script>

</x-app-layout>
