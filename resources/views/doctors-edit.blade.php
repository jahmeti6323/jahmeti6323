<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-bold text-gray-800">Izmena doktora</h2>
    </x-slot>

    <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
        <form action="{{ route('doctors.update', $doctor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="ime" class="block text-gray-700 font-semibold mb-2">Ime:</label>
                <input type="text" name="ime" id="ime" value="{{ old('ime', $doctor->ime) }}" class="w-full border rounded px-3 py-2" required>
                @error('ime')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="prezime" class="block text-gray-700 font-semibold mb-2">Prezime:</label>
                <input type="text" name="prezime" id="prezime" value="{{ old('prezime', $doctor->prezime) }}" class="w-full border rounded px-3 py-2" required>
                @error('prezime')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="specijalizacija" class="block text-gray-700 font-semibold mb-2">Specijalizacija:</label>
                <input type="text" name="specijalizacija" id="specijalizacija" value="{{ old('specijalizacija', $doctor->specijalizacija) }}" class="w-full border rounded px-3 py-2" required>
                @error('specijalizacija')
                    <p class="text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-between items-center">
                <a href="{{ route('doctors.index') }}" class="text-blue-600 hover:underline">← Nazad na listu doktora</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Sačuvaj izmene</button>
            </div>
        </form>
    </div>
</x-app-layout>
