<?php

use Livewire\Component;
use App\Traits\variableNote;
use App\Models\Anonimu;

new class extends Component
{
    use variableNote;
     
    public function mount(){
       $this->notes = Anonimu::all()->map(function($note) {
            return [
                'id'   => $note->id,
                'note' => $note->note, // testo reale
                'time' => $note->created_at->format('H:i d/m/Y'),
            ];
        })->toArray();
    }
    
};
?>

<div>

  

<!--       NOTE, POST_IT@@@@@@@@@@@@@@@@@@@@@ -->

@php
$colors = ['#FFF59D','#FFCCBC','#C8E6C9','#BBDEFB','#F8BBD0','#E1BEE7'];
@endphp

<div class="postit-container" >
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