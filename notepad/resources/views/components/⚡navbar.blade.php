<?php

use Livewire\Component;
use App\Traits\variableNote;

new class extends Component
{

use variableNote;

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
      <nav class="navbar navbar-expand-lg">
  <div class="container">

        <a class="navbar-brand d-flex align-items-center " href="{{ route('welcome') }}">
            <img src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmedia.istockphoto.com%2Fphotos%2Fcrumpled-yellow-notepad-picture-id184921412%3Fk%3D6%26m%3D184921412%26s%3D612x612%26w%3D0%26h%3DvL8zM5GlO3sSFHnDqCbJIC47VQnutPlztWrVHfolioM%3D&f=1"
                 alt="img"
                 style="width:40px;">
            <span class="ms-2">NotePad</span>
        </a>
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

  </div>
</nav>

</div>