<?php

namespace App\Http\Livewire;
use App\Models\Pessoa as Pessoas;
use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;


class Pessoa extends Component
{
    public $search = '';

    public function render()
    {


        $search =  $this->search;

        if ($search){

            $pessoas = Pessoas::where(function ($query) use( $search){
                $query->where('Nome', 'like', '%' .  $this->search . '%' )->and( 'Unidade', 'Chiaperini')
                    ->orWhere('Whatsapp', 'like', '%' .  $this->search . '%')->and( 'Unidade', 'Chiaperini')
                    ->orWhere('Departamento', 'like', '%' .  $this->search . '%' )->and( 'Unidade', 'Chiaperini')
                    ->orWhere('Ramal', 'like', '%' .  $this->search . '%')->and( 'Unidade', 'Chiaperini');
                    ;
            })->paginate(10);


        }else{

            $pessoas = Pessoas::select('Unidade','Chiaperini')->paginate(10);

        }



        return view('livewire.pessoa',[

            'pessoas' => $pessoas,

        ]);
    }
}
