<form action="{{ route('terms.destroy', $term->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Da li ste sigurni da želite da obrišete ovaj termin?');" class="text-red-600 hover:underline">
        Obriši
    </button>
</form>
