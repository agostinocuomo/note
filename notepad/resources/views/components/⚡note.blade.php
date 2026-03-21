<?php

use Livewire\Component;
use App\Models\Anonimu;
use App\Traits\variableNote;


new class extends Component
{

      use variableNote;    

     public function mount()
    {
        $this->notes = session()->get('notes', []);
    }

    public function store()
    {
     
    $this->validate([
        'note' => 'required|string'
    ]);

    $this->notes[] = $this->note;

    session()->flash('note', $this->note);

    Anonimu::create([
        'note' => $this->note,
        'user_id' => auth()->id(),  
    ]);
   
   


    session()->put('notes', $this->notes);
    $this->note = '';


    session()->flash('success', 'File caricato correttamente');

    $this->dispatch('NewNote', note: $this->note);
}

};



    
  
      //$this->validate();

        // Salva file
       // $path = $this->file->store('files', 'public');

        // Nome originale
      //  $this->name = $this->file->getClientOriginalName();
  
          


        // Salva nel DB
       /*  File::create([
            'name' => $this->name,
            'file' => $path,
        ]);

        session()->flash('success', 'File caricato correttamente'); */

?>

<div >

 
  
    <form wire:submit.prevent="store" class="form-note ">        
        <ul class="nav nav-tabs nav-tabs-legno mt-5">
  <li class="nav-item">
    <button class="nav-link" type="button" onclick="toUppercaseSelection()">
    MAIUSC
</button>
  </li>
  <li class="nav-item">
    <button class="nav-link" type="button" onclick="toLowercaseSelection()">Minuscolo</button>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">TOOL</a>
  </li>
  <li class="nav-item">
      <button type="submit" wire:submit.prevent="store" class="nav-link">Salva</button>
  </li>
</ul>
<textarea  id="myTextarea"  wire:model.defer="note" class="textarea-carta mt-5" placeholder="Scrivi qui..." ></textarea>
    </form>  
      @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
  @endif
 @error('note')
            <span style="color:red; position:absolute; ">{{ $message }}</span>
        @enderror
</div>
 
<script>
window.toUppercaseSelection = function() {
    const textarea = document.getElementById('myTextarea');
    if (!textarea) {
        alert("Textarea non trovata!");
        return;
    }

    const start = textarea.selectionStart;
    const end = textarea.selectionEnd;

    if (start === end) {
        alert("Seleziona del testo prima!");
        return;
    }

    const text = textarea.value;
    const selected = text.substring(start, end);
    const upper = selected.toUpperCase();

    textarea.value = text.substring(0, start) + upper + text.substring(end);

    textarea.selectionStart = start;
    textarea.selectionEnd = start + upper.length;
    textarea.focus();
}

 window.toLowercaseSelection = function() {
        const textarea = document.getElementById('myTextarea');
        if (!textarea) return alert("Textarea non trovata!");

        const start = textarea.selectionStart;
        const end = textarea.selectionEnd;

        if (start === end) return alert("Seleziona del testo prima!");

        const text = textarea.value;
        const selected = text.substring(start, end);
        const lower = selected.toLowerCase();

        textarea.value = text.substring(0, start) + lower + text.substring(end);
        textarea.selectionStart = start;
        textarea.selectionEnd = start + lower.length;
        textarea.focus();
    }
</script>