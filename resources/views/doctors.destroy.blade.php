<form action="{{ route('doctors.destroy', $doctor->id) }}" method="POST" class="inline">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('Da li ste sigurni da želite da obrišete ovog doktora?');" class="text-red-600 hover:underline">
        Obriši
    </button>
</form>
