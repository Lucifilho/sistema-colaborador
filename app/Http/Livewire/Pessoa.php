<?php

namespace App\Http\Livewire;
use App\Models\Pessoa as Pessoas;
use Livewire\Component;
use App\Models\Unidade;
use Request;

class Pessoa extends Component
{
    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {

        $previousUrl = url()->previous();

        $search = $this->search;

        if($search){

            $path = explode('/', $previousUrl);
            $path = $path[3];
            $newPath = explode('?', $path);
            $newPath= $newPath[0];
            $path = $newPath;


        }else{

            $path = Request::path();


        }
        
        if ($path === 'chiaperini-pro') {
            
            $path = 'Chiaperini pro';

        }

        elseif($path=== 'mercadao-lojista'){

            $path = 'mercadao lojista';
        }else{

            $path = $path;
        } 

        if($path === 'geral'){

            $pessoas = Pessoas::where(  function ($query) use( $search){
                $query->where('Nome', 'like', '%' .  $this->search . '%' )
                    ->orWhere('Whatsapp', 'like', '%' .  $this->search . '%')
                    ->orWhere('Departamento', 'like', '%' .  $this->search . '%' )
                    ->orWhere('Unidade', 'like', '%' . $this->search .'%' )
                    ->orWhere('Ramal', 'like', '%' .  $this->search . '%');
                    
            })
            ->orderBy('Unidade')
            ->orderBy('Departamento')
            ->orderBy('Nome')
            ->paginate(5);


        }else{

            $pessoas = Pessoas::where('Unidade',  $path )->where(function ($query) use( $search){

                $query->where('Ramal', 'like', '%' .  $this->search . '%' )
                ->orWhere('Whatsapp', 'like', '%' .  $this->search . '%')
                ->orWhere('Departamento', 'like', '%' .  $this->search . '%' )
                ->orWhere('Nome', 'like', '%' .  $this->search . '%');
            })
            ->paginate(5);
        }

     


        return view('livewire.pessoa', [

            'pessoas' => $pessoas ,
        ]);
    }
}
