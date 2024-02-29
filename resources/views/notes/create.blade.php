
<form action="{{ route('notes.store') }}" method="post">
    @csrf
    <div>
        <label for="module_id">Module:</label>
        <select name="module_id" id="module_id">
            @foreach ($modules as $module)
                <option value="{{ $module->id }}">{{ $module->nom_module }}</option>
            @endforeach
        </select>
    </div>

    @foreach ($stagiaires as $stagiaire)
        <div>
            <label for="notes[{{ $stagiaire->id }}]">{{ $stagiaire->nom_stagiaire }}</label>
            <input type="number" name="notes[{{ $stagiaire->id }}]" id="notes[{{ $stagiaire->id }}]" min="0" max="20" step="any" required>
        </div>
    @endforeach

    <button type="submit">Ajouter les notes</button>
</form>
