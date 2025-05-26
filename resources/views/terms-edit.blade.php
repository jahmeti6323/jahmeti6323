<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Izmeni termin</h2>
    </x-slot>

    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
        <form action="{{ route('terms.update', $term->id) }}" method="POST">
            @csrf
            @method('PUT')



            <div class="mb-4">
                <label for="usluga_id" class="block font-semibold mb-1">ID usluge:</label>
                <select class="form-control" name="usluga_id" id="" @error('usluga_id') border-red-500 @enderror value="{{ old('usluga_id', $term->usluga_id) }}">
                    @foreach ($services as $d)
                        <option  @if ($term->service->id == $d->id) selected  @endif value="{{ $d->id }}">{{$d->naziv}}</option>
                    @endforeach
                </select>
                @error('usluga_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="vreme" class="block font-semibold mb-1">Datum i vreme termina:</label>
                <input type="datetime-local" name="vreme" id="vreme"
                    value="{{ old('vreme', \Carbon\Carbon::parse($term->vreme)->format('Y-m-d\TH:i')) }}"
                    class="w-full border rounded px-3 py-2 @error('vreme') border-red-500 @enderror" />
                @error('vreme')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                Sačuvaj izmene
            </button>
        </form>
    </div>
</x-app-layout>
