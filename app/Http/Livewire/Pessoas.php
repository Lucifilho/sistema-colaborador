<?php

namespace App\Http\Livewire;
use App\Models\Pessoa;


use Livewire\Component;

class Pessoas extends Component
{


    public $search = '';
 
    public function render()
    {
        return view('livewire.pessoas', [
            'pessoas' => Pessoa::where('nome', '=',$this->search)->get(),
        ]);
    }
}
