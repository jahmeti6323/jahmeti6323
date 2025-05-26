<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-bold text-gray-800">Dodaj novi termin</h2>
    </x-slot>

    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow">
        <form action="{{ route('terms.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="pacijent_id" class="block font-semibold mb-1">Pacijent:</label>
                <select class="form-control" name="pacijent_id" id="" @error('pacijent_id') border-red-500 @enderror>
                    @foreach ($pacijenti as $d)
                        <option value="{{ $d->id }}">{{$d->ime}} {{$d->prezime}}</option>
                    @endforeach
                </select>
                @error('pacijent_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="doktor_id" class="block font-semibold mb-1" @error('doktor_id') border-red-500 @enderror>Doktor:</label>
                <select class="form-control" name="doktor_id" id="">
                    @foreach ($doctors as $d)
                        <option value="{{ $d->id }}">{{$d->ime}} {{$d->prezime}}</option>
                    @endforeach
                </select>
                @error('doktor_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="usluga_id" class="block font-semibold mb-1">Usluga:</label>
                <select class="form-control" name="usluga_id" id="" @error('usluga_id') border-red-500 @enderror>
                    @foreach ($services as $d)
                        <option value="{{ $d->id }}">{{$d->naziv}}</option>
                    @endforeach
                </select>
                @error('usluga_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="vreme" class="block font-semibold mb-1">Datum i vreme termina:</label>
                <input type="datetime-local" name="vreme" id="vreme" value="{{ old('vreme') }}"
                    class="w-full border rounded px-3 py-2 @error('vreme') border-red-500 @enderror" />
                @error('vreme')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Sačuvaj termin
            </button>
        </form>
    </div>
</x-app-layout>
