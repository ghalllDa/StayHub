<x-app-layout>

<!-- ================= MAIN CONTENT ================= -->
<div class="min-h-screen bg-gradient-to-br from-blue-100 via-slate-100 to-blue-200 py-12">

<div class="max-w-7xl mx-auto
            bg-white/80 backdrop-blur-xl
            border border-white/40
            rounded-3xl shadow-2xl
            p-8">

<!-- ================= HEADER HOTEL ================= -->
<div class="mb-6">
    <div class="flex items-center gap-3 flex-wrap">
        <h1 class="text-3xl font-extrabold text-gray-900">
            {{ $hotel->nama_hotel }}
        </h1>

        @if ($hotel->stars)
        <div class="flex text-yellow-400 text-xl">
            @for ($i = 1; $i <= $hotel->stars; $i++)
                ★
            @endfor
        </div>
        @endif
    </div>

    <p class="text-gray-500 mt-1 flex items-center gap-1">
        📍 {{ $hotel->lokasi }}
    </p>
</div>

<!-- ================= GALERI FOTO (STYLE OTA) ================= -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-10">

    @forelse ($hotel->images as $index => $img)
        @php
            $imgPath = $img->path && file_exists(public_path('images/' . $img->path))
                       ? asset('images/' . $img->path)
                       : asset('images/no-image.png');
        @endphp

        <img src="{{ $imgPath }}"
             class="rounded-2xl object-cover w-full shadow
             {{ $index === 0 ? 'md:col-span-2 md:row-span-2 h-[420px]' : 'h-[200px]' }}"
             alt="Foto Hotel {{ $hotel->nama_hotel }}">
    @empty
        <img src="{{ asset('images/no-image.png') }}"
             class="rounded-2xl object-cover h-[420px] w-full shadow"
             alt="Foto Hotel {{ $hotel->nama_hotel }}">
    @endforelse

</div>

<!-- ================= CARD HARGA ================= -->
<div class="bg-white/95 backdrop-blur
            rounded-2xl shadow-lg
            p-6 mb-12
            flex flex-col md:flex-row
            justify-between items-center">

    <div>
        <p class="text-gray-500 text-sm">Mulai dari</p>
        <p class="text-3xl font-extrabold text-orange-600">
            Rp {{ number_format($hotel->harga, 0, ',', '.') }}
            <span class="text-sm text-gray-500 font-medium">/ malam</span>
        </p>
    </div>

    <a href="#kamar"
       class="mt-4 md:mt-0
              bg-orange-500 hover:bg-orange-600
              text-white px-10 py-3
              rounded-xl font-bold shadow-md transition">
        Pilih Kamar
    </a>
</div>

<!-- ================= GRID KONTEN ================= -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-8">

<div class="md:col-span-3 space-y-10">

<!-- ================= DESKRIPSI ================= -->
<div class="bg-white rounded-2xl shadow p-6">
    <h2 class="text-2xl font-bold mb-3">Deskripsi Hotel</h2>
    <p class="text-gray-600 leading-relaxed">
        {{ $hotel->deskripsi }}
    </p>
</div>

<!-- ================= REVIEW ================= -->
<div class="bg-white rounded-2xl shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Review</h2>

    @php
        $avgRating = round($hotel->reviews->avg('rating'), 1);
        $totalReview = $hotel->reviews->count();
    @endphp

    @if ($totalReview > 0)
    <div class="flex items-center gap-4 mb-6">
        <div class="text-5xl font-extrabold text-orange-500">
            {{ $avgRating }}
        </div>

        <div>
            <div class="flex text-yellow-400 text-xl">
                @for ($i = 1; $i <= 5; $i++)
                    <span class="{{ $i <= round($avgRating) ? '' : 'text-gray-300' }}">★</span>
                @endfor
            </div>
            <p class="text-sm text-gray-500">
                Dari {{ $totalReview }} review
            </p>
        </div>
    </div>

    <div class="space-y-4">
        @foreach ($hotel->reviews->take(3) as $review)
        <div class="border rounded-xl p-4">
            <div class="flex justify-between items-center mb-1">
                <p class="font-semibold text-gray-800">
                    {{ $review->user->name }}
                </p>
                <div class="text-yellow-400 text-sm">
                    @for ($i = 1; $i <= $review->rating; $i++) ★ @endfor
                </div>
            </div>

            @if ($review->comment)
            <p class="text-gray-600 text-sm">
                {{ $review->comment }}
            </p>
            @endif
        </div>
        @endforeach
    </div>
    @else
        <p class="text-gray-500">Belum ada review.</p>
    @endif
</div>

<!-- ================= FASILITAS ================= -->
<div class="bg-white rounded-2xl shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Fasilitas Utama</h2>
    <ul class="grid grid-cols-2 md:grid-cols-3 gap-3 text-gray-600">
        @foreach (explode(',', $hotel->fasilitas) as $f)
        <li class="flex items-center gap-2">
            <span class="text-green-600">✔</span> {{ $f }}
        </li>
        @endforeach
    </ul>
</div>

<!-- ================= KAMAR (STYLE TABLE OTA) ================= -->
<div id="kamar" class="bg-white rounded-2xl shadow p-6">
    <h2 class="text-2xl font-bold mb-6">Pilihan Kamar</h2>

    @if ($hotel->rooms->where('status', 'tersedia')->count() === 0)
        <p class="text-gray-500">Tidak ada kamar tersedia</p>
    @else
    <div class="space-y-6">
        @foreach ($hotel->rooms as $room)
        @if ($room->status === 'tersedia')

        @php
            $promo = $room->promos->first();
            $hargaDiskon = $promo
                ? $room->harga - ($room->harga * $promo->diskon / 100)
                : null;
            $roomImg = $room->gambar && file_exists(public_path('images/' . $room->gambar))
                                               ? asset('images/' . $room->gambar)
                                               : asset('images/no-image.png');
        @endphp

        <div class="relative border rounded-2xl p-5
                    flex flex-col md:flex-row gap-6
                    hover:shadow-lg transition">

            @if($promo)
            <span class="absolute top-4 right-4
                         bg-red-600 text-white
                         text-xs font-bold px-4 py-1 rounded-full">
                Promo {{ $promo->diskon }}%
            </span>
            @endif

            <!-- FOTO -->
            <div class="w-full md:w-56 h-40">
                <img src="{{ $roomImg }}"
                 class="w-full h-40 object-cover rounded-lg"
                 alt="Foto {{ $room->nama_kamar }}">
            </div>

            <!-- INFO -->
            <div class="flex justify-between w-full gap-6">

                <div>
                    <h3 class="text-xl font-bold">
                        {{ $room->nama_kamar }}
                    </h3>

                    <ul class="text-sm text-gray-600 list-disc list-inside">
                        @foreach ($room->fasilitas as $f)
                            <li>{{ $f }}</li>
                        @endforeach
                    </ul>

                    <p class="text-sm text-gray-500 mt-1">
                        Kapasitas {{ $room->capacity ?? '-' }} orang
                    </p>
                </div>

                <div class="text-right">
                    @if($promo)
                        <p class="text-sm text-gray-400 line-through">
                            Rp {{ number_format($room->harga,0,',','.') }}
                        </p>
                        <p class="text-orange-600 font-bold text-xl">
                            Rp {{ number_format($hargaDiskon,0,',','.') }}
                        </p>
                    @else
                        <p class="text-orange-600 font-bold text-xl">
                            Rp {{ number_format($room->harga,0,',','.') }}
                        </p>
                    @endif

                    <p class="text-xs text-gray-500 mb-2">/ malam</p>

                    <a href="{{ route('booking.form', $room->id) }}"
                       class="inline-block bg-blue-600 hover:bg-blue-700
                              text-white px-6 py-2 rounded-xl font-semibold">
                        Pilih
                    </a>
                </div>

            </div>
        </div>

        @endif
        @endforeach
    </div>
    @endif
</div>

<!-- ================= MAP ================= -->
<div class="bg-white rounded-2xl shadow p-6">
    <h2 class="text-2xl font-bold mb-4">Lokasi Hotel</h2>
    <div id="map" class="w-full h-96 rounded-2xl"></div>
</div>

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



<!-- ================= LEAFLET (TIDAK DIUBAH) ================= -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<script>
    const map = L.map('map').setView(
        [{{ $hotel->latitude }}, {{ $hotel->longitude }}], 15
    );

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap'
    }).addTo(map);

    L.marker([{{ $hotel->latitude }}, {{ $hotel->longitude }}])
        .addTo(map)
        .bindPopup("{{ $hotel->nama_hotel }}")
        .openPopup();
</script>

</x-app-layout>