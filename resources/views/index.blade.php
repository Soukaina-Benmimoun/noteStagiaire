<!-- resources/views/stagiaires/index.blade.php -->

<table border=1>
    <thead>
        <tr>
            <th>Nom Stagiaire</th>
            <th>Modules</th>
            <th>Notes</th>
            <th>actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($stagiaires as $stagiaire)
            <tr>
                <td>{{ $stagiaire->nom_stagiaire }}</td>
                <td>
                    @foreach ($stagiaire->modules as $module)
                        {{ $module->nom_module }}<br>
                    @endforeach
                </td>
                <td>
                    @foreach ($stagiaire->modules as $module)
                        {{ $module->pivot->note }}<br>
                    @endforeach
                </td>
                <td> <a href="{{ route('stagiaire.detail',['id'=>$stagiaire->id])}}"><button>Details</button></a></td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('notes.create')}}"><button>Ajouter </button></a>