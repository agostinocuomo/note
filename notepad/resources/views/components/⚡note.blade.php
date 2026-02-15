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

<div>

  @if (session('success'))
        <p style="color:green">{{ session('success') }}</p>
  @endif

    <form wire:submit.prevent="store">        
        <ul class="nav nav-tabs nav-tabs-legno">
  <li class="nav-item">
    <a class="nav-link " aria-current="page" href="#">MAIUSC</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">COLOR</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">TOOL</a>
  </li>
  <li class="nav-item">
      <button type="submit" wire:submit.prevent="store" class="nav-link">Salva</button>
  </li>
</ul>
<textarea   wire:model.defer="note" class="textarea-carta" placeholder="Scrivi qui..." ></textarea>
    </form>  

        @error('note')
            <span style="color:red">{{ $message }}</span>
        @enderror
</div>


