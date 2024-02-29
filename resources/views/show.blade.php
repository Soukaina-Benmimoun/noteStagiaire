<style>
    *{}
</style>


<h2>Details du stagiaire :<br>{{$stagiaire->nom_stagiaire}} {{$stagiaire->prenom_stagiaire}}</h2>


<table>
    <tr>
        <th>module</th>
        <th>note</th>
    </tr>
    @foreach($stagiaire->modules as $module)
    <tr>
        <td>{{$module->nom_module}}</td>
        <td>{{$module->pivot->note}}</td>
    </tr>
    @endforeach
</table>