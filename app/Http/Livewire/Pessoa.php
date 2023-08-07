<?php

namespace App\Http\Livewire;
use App\Models\Pessoa as Pessoas;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Request;



class Pessoa extends Component
{
    public $search = '';

    public function render()
    {


        $search =  $this->search;
        $url = REQUEST::path();



        if ($search){



            $pessoas = Pessoas::where('Unidade','Chiaperini')->where(  function ($query) use( $search){
                $query->where('Nome', 'like', '%' .  $this->search . '%' )
                    ->orWhere('Whatsapp', 'like', '%' .  $this->search . '%')
                    ->orWhere('Departamento', 'like', '%' .  $this->search . '%' )
                    ->orWhere('Ramal', 'like', '%' .  $this->search . '%');
                    
            })
            ->orderBy('Departamento')
            ->orderBy('Nome')
            ->paginate(10);


        
        }else{

            $pessoas = Pessoas::where('Unidade','Chiaperini')
            ->orderBy('Departamento')
            ->orderBy('Nome')
            ->paginate(10);

        }



        return view('livewire.pessoa',[

            'pessoas' => $pessoas,

        ]);
    }
}
