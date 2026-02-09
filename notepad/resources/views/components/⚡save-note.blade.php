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

<div class="postit-container" style="display: flex; flex-wrap: wrap; gap: 20px;">
    @foreach($this->notes as $i => $note)
        
         @php
            // Prendi il testo solo se esiste, altrimenti stringa vuota
            $text = $note['note'];
            $time = $note['time'];
        @endphp

     <div class="post-it" style="background-color: {{ $colors[$i % count($colors)] }};">
            <p>{{ $text }}</p>
            <small>{{ $time }}</small>
        </div>
        
    @endforeach
</div>

</div>
