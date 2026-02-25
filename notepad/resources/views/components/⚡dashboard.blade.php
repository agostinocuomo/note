<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Anonimu;

  new class  extends Component
{
    public $notes=[]; // o "note", a seconda dei dati che vuoi mostrare

    public function mount()
    {
        // Recupera l'utente loggato
        $user = Auth::user();

        // Carica i dati dell'utente, es. i post
        
        $this->notes = Anonimu::where('user_id', Auth::id())->get();
    }

  
}
?>

<div>
  @props([])




@php
$colors = ['#FFF59D','#FFCCBC','#C8E6C9','#BBDEFB','#F8BBD0','#E1BEE7'];
@endphp

@props([])
<div class="postit-container" >
     <h1 class="text-2xl font-bold mb-4">Ciao, {{ auth()->user()->name }}</h1>

    

    @if($this->notes->isEmpty())
        <p>Non hai ancora note.</p>
    @else

    @foreach($this->notes as $i => $note)
        
         @php
            // Prendi il testo solo se esiste, altrimenti stringa vuota
            $text = $note['note'];
            $time = $note['time'];
        @endphp

     <div class="post-it" style="background-color: {{ $colors[$i % count($colors)] }};" >
            <p>{{ $text }}</p>
            <small>{{ $time }}</small>
        </div>
        
    @endforeach
    @endif
</div>
<script>
let activeNote = null;
let offsetX = 0;
let offsetY = 0;

document.querySelectorAll(".post-it").forEach(note => {

    note.addEventListener("mousedown", function(e) {
        const container = note.parentElement;
        const rect = note.getBoundingClientRect();
        const containerRect = container.getBoundingClientRect();

        // Calcola la posizione relativa al container
        const left = rect.left - containerRect.left;
        const top = rect.top - containerRect.top;

        // Trasforma in absolute
        note.style.position = "absolute";
        note.style.left = left + "px";
        note.style.top = top + "px";
       note.style.zIndex = 1000; // porta in primo piano
        activeNote = note;
        offsetX = e.clientX - left;
        offsetY = e.clientY - top;

        note.style.cursor = "grabbing";
    });
});

document.addEventListener("mousemove", function(e) {
    if (activeNote) {
        activeNote.style.left = (e.clientX - offsetX) + "px";
        activeNote.style.top = (e.clientY - offsetY) + "px";
    }
});

document.addEventListener("mouseup", function() {
    if (activeNote) {
        activeNote.style.cursor = "grab";
        activeNote = null;
    }
    
});
</script>
</div>