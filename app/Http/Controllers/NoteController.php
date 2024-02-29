<?php
namespace App\Http\Controllers;

use App\Models\Module;
use App\Models\Stagiaire;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function create()
    {
        $modules = Module::all();
        $stagiaires = Stagiaire::all();
        return view('notes.create', compact('modules', 'stagiaires'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'module_id' => 'required|exists:modules,id',
            'notes' => 'required|array',
            'notes.*' => 'required|numeric|min:0|max:20',
        ]);

        $module = Module::findOrFail($data['module_id']);

        $notesToSync = [];

        foreach ($data['notes'] as $stagiaire_id => $note) {
            $notesToSync[$stagiaire_id]=['note'=>$note];
        }
        $module->stagiaires()->syncWithoutDetaching($notesToSync);

        return redirect('/')->with('success', 'Les notes ont été ajoutées avec succès.');
    }
}
