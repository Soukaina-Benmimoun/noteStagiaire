<?php

namespace App\Models;
use App\Models\Stagiaire;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;
    protected $fillable =[
        'nom_module',
        'coeficient'
    ];
    public function stagiaires(){
        return $this->belongsToMany(Stagiaire::class,'module_stagiaire')
        ->withPivot('note')
        ->withTimestamps();
    }
}
