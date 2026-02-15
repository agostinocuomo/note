<?php

use Livewire\Component;
use App\Traits\variableNote;


new class extends Component
{


  use variableNote;

  public string $componenteAttivo = 'A';
     // variabile pubblica che indica quale componente mostrare
    
  public function mostraA()
    {
        $this->componenteAttivo = 'A';
    }

    public function mostraB()
    {
        $this->componenteAttivo = 'B';
    }

};
?>

<div>
<div>
   <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Note</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
           <button type="button" class="nav-link active" wire:click="mostraA">
        NotePad
           </button>
        </li>
        <li class="nav-item">
         <button type="button" class="nav-link active" wire:click="mostraB">
        Note Salvate
         </button>
        </li>
      </ul>
    </div>
                <a href="{{ route('login') }}" class="btn btn-success m-2 float-end">Login</a>
            <a href="{{ route('register') }}" class="btn btn-primary float-end">Register</a>

  </div>
</nav>

<br>
<br>

@if($componenteAttivo === 'A')
    @livewire('note', [], key('first'))
@elseif($componenteAttivo === 'B')
    @livewire('save-note', [], key('second'))
@endif

{{$componenteAttivo}}
</div>

</div>