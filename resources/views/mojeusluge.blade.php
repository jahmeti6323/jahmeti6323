<x-app-layout>
    <x-slot name="header">
        <h2 class="text-3xl font-bold text-gray-900">🦷 Zakažite stomatološki termin</h2>
    </x-slot>

    <div class="py-10 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

        {{-- Uspešna poruka --}}
        @if(session('success'))
            <div class="bg-green-50 border border-green-400 text-green-800 px-6 py-4 rounded-lg shadow animate-fade-in-down">
                <strong class="font-semibold">Uspešno!</strong>
                <span class="ml-2">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Kartice usluga --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($usluge as $usluga)
                <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition duration-300 border border-gray-100">
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2">{{ $usluga->naziv }}</h3>
                        <p class="text-gray-600 text-sm mb-3">{{ $usluga->opis }}</p>
                        <p class="text-gray-700 font-medium mb-4">💰 Cena: <span class="text-blue-600">{{ number_format($usluga->cena, 2) }} RSD</span></p>

                        {{-- Forma za zakazivanje --}}
                        <form method="POST" action="{{ route('usluge.zakazi') }}" class="space-y-3">
                            @csrf
                            <input type="hidden" name="usluga_id" value="{{ $usluga->id }}">

                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Datum i vreme</label>
                                <input type="datetime-local" name="vreme"
                                    class="w-full border border-gray-300 rounded-lg px-3 py-2 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                                    required>
                            </div>

                            <button type="submit"
                                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg transition shadow">
                                📅 Zakaži termin
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Animacija --}}
    <style>
        .animate-fade-in-down {
            animation: fadeInDown 0.5s ease-out forwards;
        }

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-10px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</x-app-layout>
