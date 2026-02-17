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
<div >
   <nav class="navbar navbar-expand-lg" >
  <div class="container-fluid">
     <a class="navbar-brand " href="#"><img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fphotos%2Fcrumpled-yellow-notepad-picture-id184921412%3Fk%3D6%26m%3D184921412%26s%3D612x612%26w%3D0%26h%3DvL8zM5GlO3sSFHnDqCbJIC47VQnutPlztWrVHfolioM%3D&f=1&nofb=1&ipt=b71560853239353471c3fa5310a3f3c6989138cd9424d38a01b9c4abaa286318" alt="img" class="img-fluid" style="width:10%; height:15%"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarNav">
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
              @guest 
       <div class="d-flex gap-2 ms-auto">
        <a href="{{ route('login') }}" class="btn btn-success">
            Login
        </a>
        <a href="{{ route('register') }}" class="btn btn-primary">
            Register
        </a>
      </div>
      @endguest
      @auth
      <a type="button" class="btn btn-danger" href="{{ route('logout') }}">Logout</a>
      @endauth
  </div>
</nav>
</div>
<br>
<br>
<br>

@if($componenteAttivo === 'A')
    @livewire('note', [], key('first'))
@elseif($componenteAttivo === 'B')
    @livewire('save-note', [], key('second'))
@endif


</div>