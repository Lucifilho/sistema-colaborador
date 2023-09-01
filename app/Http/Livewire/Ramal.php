<?php

namespace App\Http\Livewire;
use Livewire\Component;
use App\Models\Unidade;
use Request;



class Pessoaaa extends Component
{
    public $search = '';

    public function render(){


        $search =  $this->search;

        $path= Request::path();

        if ( $search && $search =! '' ){

            $previousUrl = url()->previous();

            $path = explode('/', $previousUrl);


            if($path[3] === 'geral'){

                $pessoas = Pessoas::where(  function ($query) use( $search){
                    $query->where('Nome', 'like', '%' .  $this->search . '%' )
                        ->orWhere('Whatsapp', 'like', '%' .  $this->search . '%')
                        ->orWhere('Departamento', 'like', '%' .  $this->search . '%' )
                        ->orWhere('Unidade', 'like', '%' . $this->search .'%' )
                        ->orWhere('Ramal', 'like', '%' .  $this->search . '%');
                        
                })
                ->orderBy('Departamento')
                ->orderBy('Nome')
                ->paginate(5);

            
            }else {
                
                if ($path[3] === 'chiaperini-pro') {
            
                    $path = 'Chiaperini pro';
    
                }
    
                elseif($path[3] === 'mercadao-lojista'){
    
                    $path = 'mercadao lojista';
                }else{
    
                    $path = $path[3];
                } 


                $pessoas = Pessoas::where('Unidade', $path )->where(  function ($query) use( $search){
                    $query->where('Nome', 'like', '%' .  $this->search . '%' )
                        ->orWhere('Whatsapp', 'like', '%' .  $this->search . '%')
                        ->orWhere('Departamento', 'like', '%' .  $this->search . '%' )
                        ->orWhere('Ramal', 'like', '%' .  $this->search . '%');
                        
                })
                ->orderBy('Departamento')
                ->orderBy('Nome')
                ->paginate(5);

            }

        
        }else{
            
            if ($path === 'geral') {

                
                $pessoas = Pessoas::orderBy('Unidade')
                ->orderBy('Nome')  
                ->orderBy('Departamento') 
                ->paginate(5);

                
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
                ->paginate(5);

            }

            

        }


        return view('livewire.pessoa',[

            'pessoas' => $pessoas,

        ]);
    }
}
