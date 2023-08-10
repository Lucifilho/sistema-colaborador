<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use App\Models\Departamento;
use App\Models\Unidade;
use Illuminate\Http\Request as Requests;
use Request;
use DB;
use URL;



class EventController extends Controller

{


    public function home (){

        $path = Request::path();

        if ($path=="/" ) {
            
            $path = "index";
        }else{
            
            $path = "";
        }

        $pessoas = Pessoa::paginate(15);

        return view('pages.home' , ['pessoas' => $pessoas,'path'=> $path]);

    }

    public function colaboradorPage ($id){

        $path= '';

        $pessoa = Pessoa::findOrFail($id);

        return view('pages.colaboradorPage' , ['pessoa' => $pessoa]);

    }


    public function editarColaboradorPage ($id){

        $path= '';

        $pessoa = Pessoa::findOrFail($id);

        $departamentos = Departamento::all();

        $unidades = Unidade::all();

        return view('pages.editarColaboradorPage' , ['pessoa' => $pessoa,'departamentos'=> $departamentos,'unidades' => $unidades]);

    }


    public function editarColaborador (Request $request){


        $data = $request -> all();

        Pessoa::findOrFail($request -> id) -> update($data);

        return redirect('/colaborador/'.$request -> id)->with('msg','Colaborador alterado com sucesso');


    }

    public function novoColaboradorPage (){

        $path= '';

        $departamentos = Departamento::all();

        $unidades = Unidade::all();
    
        return view('pages.novoColaborador',['departamentos'=> $departamentos,'unidades' => $unidades, 'path'=>$path] );

    }

    public function novoColaborador(Requests $request){


        $pessoa = new Pessoa();

        $pessoa -> Ramal = $request -> Ramal;
        $pessoa -> Nome = $request -> Nome;
        $pessoa -> Whatsapp = $request -> Whatsapp;
        $pessoa -> Departamento = $request -> Departamento;
        $pessoa -> Unidade = $request -> Unidade;
        $pessoa -> Skype = $request -> Skype;


        $pessoa -> save();

        return redirect('/registrar-colaborador')-> with('msg','Colaborador cadastrado(a) com sucesso');
    }

    public function excluirColaborador($id){


        $pessoa = Pessoa::findOrFail($id);

        $id = $pessoa -> id;

        Pessoa::findOrFail($id)->delete();

        return redirect('/chiaperini' )->with('msg','Colaborador excluído(a) com sucesso');
    }

    public function ramaisPage (){

        $path= Request::path();

        $search = "ola";

        $pessoas = Pessoa::paginate(15);
        
        $all = Pessoa::all();

    

        return view('pages.ramais' , [
            'pessoas' => $pessoas, 'search'=> $search, 
            'path' => $path ]);
        
            
       
    }
}
