<?php

namespace App\Traits;

trait variableNote
{
    public $note = '';
    public $notes = [];
    public string $componenteAttivo = 'A';
     public function aggiorna($note)
    {
        $this->dispatch('evento', valore: $note);
    }
   
}
