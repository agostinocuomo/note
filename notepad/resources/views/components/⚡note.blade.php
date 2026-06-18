<?php

use Livewire\Component;
use App\Models\Anonimu;
use App\Traits\variableNote;


new class extends Component
{

      use variableNote;    
       
public $note = '';

     public function mount()
    {
        $this->note = session()->get('note', []);
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
  <li class="nav-item tool">
    <button class="nav-link tool" type="button" onclick="toUppercaseSelection()">
    MAIUSC
</button>
  </li>
  <li class="nav-item tool">
    <button class="nav-link tool" type="button" onclick="toLowercaseSelection()">Minuscolo</button>
  </li>
  <li class="nav-item">
   <div class="dropdown">
  <button class="btn  tool" type="button" data-bs-toggle="dropdown" aria-expanded="false"  data-bs-auto-close="false">
    Tool
  </button>
  <ul class="dropdown-menu dropdown-menu-dark"  id="btnChiudi">
    <li><p class="d-inline-flex gap-1">
  <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
   Color
  </button>
</p>
<div class="collapse " id="collapseExample">
  <div class="card card-body color-picker">
   <i class="bi bi-palette-fill me-2"></i>
    <span class="color-box"   style="background:#dc3545"  onmousedown="ColorSelection('#dc3545')"></span>
    <span class="color-box"  style="background:#fd7e14"  onmousedown="ColorSelection('#fd7e14')"></span>
    <span class="color-box"  style="background:#ffc107"  onmousedown="ColorSelection('#ffc107')"></span>
    <span class="color-box"  style="background:#198754"  onmousedown="ColorSelection('#198754')"></span>
    <span class="color-box" style="background:#0dcaf0" onmousedown="ColorSelection('#0dcaf0')"></span>
    <span class="color-box" style="background:#0d6efd" onmousedown="ColorSelection('#0d6efd')"></span>
    <span class="color-box"  style="background:#6f42c1"  onmousedown="ColorSelection('#6f42c1')"></span>
  </div>
</div></li>
    <li><a class="dropdown-item" href="#" onclick="BoldText()" >Grassetto</a></li>
    <li><a class="dropdown-item" href="#" onclick="UnboldText()">Sottile //Non Funziona</a></li>
    <li><hr class="dropdown-divider"></li>
    
  </ul>
</div>
  </li>
  <li class="nav-item tool">
      <button type="submit" onclick="sendNote()" class="nav-link tool">Salva</button>
  </li>
</ul>
<div  id="myTextarea"  x-on:input="$wire.set('note', $el.innerHTML)" contenteditable="true"   wire:ignore class="textarea-carta mt-5" placeholder="Scrivi qui..." ></div >
    </form>  
      @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
  @endif
 @error('note')
            <span style="color:red; position:absolute; ">{{ $message }}</span>
        @enderror
</div>
 
<script>
 
function sendNote() {
    const note = document.getElementById('editor').innerHTML;

    Livewire.dispatch('saveText', {
        note: note
    });
}

/* FUNZIONE PULSANTI E TOOL */

window.toUppercaseSelection = function () {
    const selection = window.getSelection();

    if (!selection || selection.rangeCount === 0) {
        alert("Seleziona del testo prima!");
        return;
    }

    const range = selection.getRangeAt(0);

    const selectedText = range.toString();

    if (!selectedText) {
        alert("Seleziona del testo prima!");
        return;
    }

    const upper = selectedText.toUpperCase();

    // sostituisce il testo selezionato
    range.deleteContents();
    range.insertNode(document.createTextNode(upper));

    // opzionale: pulisce selezione
    selection.removeAllRanges();
};

 window.toLowercaseSelection = function () {
    const selection = window.getSelection();

    if (!selection || selection.rangeCount === 0) {
        alert("Seleziona del testo prima!");
        return;
    }

    const range = selection.getRangeAt(0);

    const selectedText = range.toString();

    if (!selectedText) {
        alert("Seleziona del testo prima!");
        return;
    }

    const upper = selectedText.toLowerCase();

    // sostituisce il testo selezionato
    range.deleteContents();
    range.insertNode(document.createTextNode(upper));

    // opzionale: pulisce selezione
    selection.removeAllRanges();
};

 


     window.ColorSelection = function (col) {
    const selection = window.getSelection();

    if (!selection || selection.rangeCount === 0) {
        alert("Seleziona del testo prima!");
        return;
    }

    const range = selection.getRangeAt(0);

    const selectedText = range.toString();

    if (!selectedText) {
        alert("Seleziona del testo prima!");
        return;
    }

    // crea span colorato
    const span = document.createElement("span");
    span.style.color = col;
    span.textContent = selectedText;

    // sostituisce la selezione con lo span
    range.deleteContents();
    range.insertNode(span);

    // pulisce selezione
    selection.removeAllRanges();
};

 window.BoldText = function () {
    const selection = window.getSelection();

    if (!selection || selection.rangeCount === 0) {
        return;
    }

    const range = selection.getRangeAt(0);
    const selectedText = range.toString();

    if (!selectedText) {
        return;
    }

    const strong = document.createElement('strong');
    strong.textContent = selectedText;

    range.deleteContents();
    range.insertNode(strong);
     range.selctedText(strong);

    selection.removeAllRanges();
};

window.UnboldText = function () {
    const selection = window.getSelection();

    if (!selection || selection.rangeCount === 0) {
        return;
    }

    const range = selection.getRangeAt(0);

    let node = range.commonAncestorContainer;

    if (node.nodeType === Node.TEXT_NODE) {
        node = node.parentElement;
    }

    const strong = node.closest('strong');

    if (!strong) {
        return;
    }

    const parent = strong.parentNode;

    while (strong.firstChild) {
        parent.insertBefore(strong.firstChild, strong);
    }

    parent.removeChild(strong);

    selection.removeAllRanges();
};

</script>
