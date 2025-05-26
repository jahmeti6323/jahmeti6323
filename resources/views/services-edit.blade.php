<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Izmena usluge</h2>
    </x-slot>

    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <form action="{{ route('services.update', $service->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="naziv" class="block text-gray-700 font-semibold mb-2">Naziv usluge:</label>
                <input type="text" name="naziv" id="naziv" value="{{ old('naziv', $service->naziv) }}" class="w-full border rounded px-3 py-2" required>
                @error('naziv')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="cena" class="block text-gray-700 font-semibold mb-2">Cena (RSD):</label>
                <input type="number" step="0.01" name="cena" id="cena" value="{{ old('cena', $service->cena) }}" class="w-full border rounded px-3 py-2" required>
                @error('cena')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4 flex items-center">
                <input type="checkbox" name="featured" id="featured" class="mr-2" {{ old('featured', $service->featured) ? 'checked' : '' }}>
                <label for="featured" class="text-gray-700 font-semibold">Istaknuto</label>
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('services.index') }}" class="text-blue-600 hover:underline">← Nazad na listu usluga</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Sačuvaj izmene</button>
            </div>
        </form>
    </div>
</x-app-layout>
