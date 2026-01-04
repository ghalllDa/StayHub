<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl">
            Review Hotel {{ $booking->room->hotel->nama_hotel }}
        </h2>
    </x-slot>

    <div class="max-w-xl mx-auto py-10">
        <form method="POST"
              action="{{ route('reviews.store', $booking) }}"
              class="bg-white p-6 rounded-lg shadow space-y-4">
            @csrf

            {{-- ERROR MESSAGE --}}
            @if ($errors->any())
                <div class="bg-red-50 text-red-600 p-3 rounded">
                    {{ $errors->first() }}
                </div>
            @endif

            {{-- RATING --}}
            <div>
                <label class="block font-semibold mb-2">Rating</label>

                <div class="flex flex-row-reverse justify-end gap-1 text-2xl rating">
                    @for ($i = 5; $i >= 1; $i--)
                        <input
                            type="radio"
                            id="star{{ $i }}"
                            name="rating"
                            value="{{ $i }}"
                            class="hidden"
                            {{ old('rating') == $i ? 'checked' : '' }}
                            required
                        >
                        <label
                            for="star{{ $i }}"
                            class="cursor-pointer text-gray-300 hover:text-yellow-400">
                            ★
                        </label>
                    @endfor
                </div>
            </div>

            {{-- KOMENTAR --}}
            <div>
                <label class="block font-semibold mb-2">Komentar</label>
                <textarea
                    name="comment"
                    rows="4"
                    class="w-full border rounded p-2"
                    placeholder="Bagaimana pengalaman Anda?">{{ old('comment') }}</textarea>
            </div>

            <button class="bg-blue-600 hover:bg-blue-700
                           text-white px-4 py-2 rounded">
                Kirim Review
            </button>
        </form>
    </div>
</x-app-layout>

<style>
.rating label {
    cursor: pointer;
}
.rating input:checked ~ label,
.rating label:hover,
.rating label:hover ~ label {
    color: #facc15; /* yellow-400 */
}
</style>
