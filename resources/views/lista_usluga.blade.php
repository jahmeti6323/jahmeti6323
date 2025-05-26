<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-900">🛠️ Admin Panel – Upravljanje entitetima</h2>
    </x-slot>

    <div class="py-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 space-y-16">

        {{-- Sekcija: USLUGE --}}
        <section>
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-semibold text-gray-800">🧾 Usluge</h3>
                <a href="{{ route('services.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow">+ Dodaj uslugu</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-auto bg-white rounded-xl shadow-md">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">Naziv</th>
                            <th class="px-4 py-3 text-left">Cena</th>
                            <th class="px-4 py-3 text-left">Istaknuto</th>
                            <th class="px-4 py-3 text-left">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $service)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $service->naziv }}</td>
                                <td class="px-4 py-3">{{ number_format($service->cena, 2, ',', '.') }} RSD</td>
                                <td class="px-4 py-3">{{ $service->featured ? '✅ Da' : '❌ Ne' }}</td>
                                <td class="px-4 py-3 space-x-4">
                                    <a href="{{ route('services.edit', $service->id) }}" class="text-blue-600 hover:underline">Izmeni</a>
                                    <form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline" onsubmit="return confirm('Obrisati ovu uslugu?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Obriši</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        {{-- Sekcija: DOKTORI --}}
        <section>
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-semibold text-gray-800">👨‍⚕️ Doktori</h3>
                <a href="{{ route('doctors.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow">+ Dodaj doktora</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-auto bg-white rounded-xl shadow-md">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">Ime i prezime</th>
                            <th class="px-4 py-3 text-left">Specijalizacija</th>
                            <th class="px-4 py-3 text-left">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($doctors as $doctor)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $doctor->ime }} {{ $doctor->prezime }}</td>
                                <td class="px-4 py-3">{{ $doctor->specijalizacija }}</td>
                                <td class="px-4 py-3 space-x-4">
                                    <a href="{{ route('doctors.edit', $doctor->id) }}" class="text-blue-600 hover:underline">Izmeni</a>
                                    <form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="inline" onsubmit="return confirm('Obrisati ovog doktora?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Obriši</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

        {{-- Sekcija: TERMINI --}}
        <section>
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-semibold text-gray-800">📅 Termini</h3>
                <a href="{{ route('terms.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 shadow">+ Dodaj termin</a>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full table-auto bg-white rounded-xl shadow-md">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3 text-left">Pacijent</th>
                            <th class="px-4 py-3 text-left">Doktor</th>
                            <th class="px-4 py-3 text-left">Usluga</th>
                            <th class="px-4 py-3 text-left">Vreme</th>
                            <th class="px-4 py-3 text-left">Akcije</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($terms as $term)
                            <tr class="border-t hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $term->patien->ime }} {{ $term->patien->prezime }}</td>
                                <td class="px-4 py-3">{{ $term->doctor->ime }} {{ $term->doctor->prezime }}</td>
                                <td class="px-4 py-3">{{ $term->service->naziv }}</td>
                                <td class="px-4 py-3">{{ \Carbon\Carbon::parse($term->vreme)->format('d.m.Y H:i') }}</td>
                                <td class="px-4 py-3 space-x-4">
                                    <a href="{{ route('terms.edit', $term->id) }}" class="text-blue-600 hover:underline">Izmeni</a>
                                    <form action="{{ route('terms.destroy', $term->id) }}" method="POST" class="inline" onsubmit="return confirm('Obrisati ovaj termin?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Obriši</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

    </div>
</x-app-layout>
