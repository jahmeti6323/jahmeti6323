<form action="{{ route('services.destroy', $service->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Da li ste sigurni da želite da obrišete ovu uslugu?');" class="text-red-600 hover:underline">
        Obriši
    </button>
</form>
