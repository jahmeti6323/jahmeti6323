<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Dodaj novu uslugu</h2>
    </x-slot>

    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-6">
        <form action="{{ route('services.store') }}" method="POST">
            @csrf

            {{-- Naziv --}}
            <div class="mb-4">
                <label for="naziv" class="block text-gray-700 font-semibold mb-2">Naziv usluge</label>
                <input type="text" name="naziv" id="naziv" value="{{ old('naziv') }}"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                @error('naziv')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Cena --}}
            <div class="mb-4">
                <label for="cena" class="block text-gray-700 font-semibold mb-2">Cena (RSD)</label>
                <input type="number" name="cena" id="cena" value="{{ old('cena') }}" min="0" step="0.01"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
                @error('cena')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Istaknuto --}}
            <div class="mb-6">
                <label class="inline-flex items-center">
                    <input type="checkbox" name="featured" id="featured" value="1" {{ old('featured') ? 'checked' : '' }}
                        class="form-checkbox h-5 w-5 text-blue-600">
                    <span class="ml-2 text-gray-700 font-semibold">Istaknuto</span>
                </label>
                @error('featured')
                    <p class="text-red-600 mt-1 text-sm">{{ $message }}</p>
                @enderror
            </div>

            {{-- Dugme --}}
            <div>
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Sačuvaj uslugu
                </button>
                <a href="{{ route('services.index') }}"
                   class="ml-4 text-gray-600 hover:underline">Otkaži</a>
            </div>
        </form>
    </div>
</x-app-layout>
