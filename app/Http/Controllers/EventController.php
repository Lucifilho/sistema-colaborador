<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class EventController extends Controller

{


    public function home (){

        $pessoas = Pessoa::paginate(15);


        return view('pages.home' , ['pessoas' => $pessoas]);

    }

    public function chiaperiniPage (){

        $search = "ola";

        $pessoas = Pessoa::paginate(15);
        
        $all = Pessoa::all();

        //dd($registros);

        foreach ($pessoas as $pessoa){

            $nome = $pessoa-> nome;

            
        }


        $dashboard=DB::table('Pessoas')
        ->where('Nome', $nome)
        ->orderBy('Unidade')
        ->get();

        return view('pages.chiaperini' , [
            'pessoas' => $pessoas, 'search'=> $search, 
            'dashboard' => $dashboard ]);
        
            
       
    }
}
