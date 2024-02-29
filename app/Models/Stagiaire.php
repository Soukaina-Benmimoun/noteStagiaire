<?php

namespace App\Models;
use App\Models\Module;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $fillable=[
        'nom_stagiaire',
        'prenom_stagiaire',
        'filiere'
    ];
    public function modules(){
        return $this->belongsToMany(Module::class , 'module_stagiaire')
        ->withPivot('note')
        ->withTimestamps();
    }
}
