<?php

namespace App\Models;

use App\Models\Anonimu;

use Illuminate\Database\Eloquent\Model;

class Anonimu extends Model
{

    protected $table = 'anonimus';

     protected $fillable = [
        'note', // qui aggiungi tutte le colonne che vuoi aggiornare da Livewire
    ];
  
    
}
