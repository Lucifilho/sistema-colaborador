<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pessoa;


class Ramal extends Component
{



    public function render()
    {

        $search =' ' ;

        $pessoas = Pessoa::where('Nome', $search );
            //$pessoas = ;

        return view('livewire.ramal',[
            
            'pessoas'=> $pessoas, 
        ]);
    }
}
