<?php

namespace App\Http\Livewire;
use App\Models\Pessoa as Pessoas;
use Livewire\Component;
use App\Models\Unidade;
use Request;



class Pessoa extends Component
{
    public $search = '';

    public function render(){


        $search =  $this->search;

        $path= Request::path();

        
        if ( $search ){

            $unidades = Unidade::all();

            foreach ($unidades as $unidade){

                $nomeUnidade = $unidade-> nomeUnidade;

            }

            if($path == 'chiaperini-pro'){

                $path = 'chiaperini';
            }else{

                $path = 'Techto';
            } 


            $pessoas = Pessoas::where('Unidade', $path )->where(  function ($query) use( $search){
                $query->where('Nome', 'like', '%' .  $this->search . '%' )
                    ->orWhere('Whatsapp', 'like', '%' .  $this->search . '%')
                    ->orWhere('Departamento', 'like', '%' .  $this->search . '%' )
                    ->orWhere('Ramal', 'like', '%' .  $this->search . '%');
                    
            })
            ->orderBy('Departamento')
            ->orderBy('Nome')
            ->paginate(10);
        
        }else{

            if($path == 'chiaperini-pro'){

                $path = 'chiaperini pro';
                
            }elseif($path == 'mercadao-lojista'){

                $path = 'mercadão lojista';
            }else{

                $path = $path;
            } 

            $pessoas = Pessoas::where('Unidade',$path)
            ->orderBy('Departamento')
            ->orderBy('Nome')
            ->paginate(10);

        }


        return view('livewire.pessoa',[

            'pessoas' => $pessoas,

        ]);
    }
}
