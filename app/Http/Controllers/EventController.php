<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pessoa;
use Illuminate\Support\Facades\Cache;
use App\Models\Post;
use App\Models\User;
use App\Models\Departamento;
use App\Models\Unidade;
use Illuminate\Http\Request as Requests;
use Request;
use Carbon\Carbon;
use DB;
use Auth;
use URL;



class EventController extends Controller

{

    public function lastUpdatade(){


        $lastDateRecord = Pessoa::latest('updated_at')->first();

        if ($lastDateRecord) {

            $lastDate = $lastDateRecord->updated_at->format('d/m/Y');

        } else {

        }



        return view('layouts.main' , ['pessoas' => $pessoas, 'lastDate' => $lastDate]);
    }

    public function login (){

        if (Auth::check()) {
            $userLogged = Auth::user()->name;
        } else {
            $userLogged = "Guest";
        }

        $lastDateRecord = Pessoa::latest('updated_at')->first();

        if ($lastDateRecord) {

            $lastDate = $lastDateRecord->updated_at->format('d/m/Y');

        } else {

        }

        $path = Request::path();

        return view('auth.login' , ['path'=> $path,'lastDate' => $lastDate,'userLogged'=> $userLogged ]);
    }

    public function dashboard (){

        if (Auth::check()) {
            $userLogged = Auth::user()->name;
        } else {
            $userLogged = "Guest";
        }

        $lastDateRecord = Pessoa::latest('updated_at')->first();

        if ($lastDateRecord) {

            $lastDate = $lastDateRecord->updated_at->format('d/m/Y');

        } else {

        }

        $path = Request::path();

        return view('pages.dashboard' , ['path'=> $path,'lastDate' => $lastDate,'userLogged'=> $userLogged ]);
    }

    public function portalColaborador (){

        $posts = Post::paginate(15);

        return view('pages.portalColaborador', ['posts' => $posts] );
    }

    public function home (){


        if (Auth::check()) {
            $userLogged = Auth::user()->name;
        } else {
            $userLogged = "Guest";
        }

        $path = Request::path();

        if ($path=="/" ) {

            $path = "index";
        }else{

            $path = "";
        }

        $lastDateRecord = Pessoa::latest('updated_at')->first();

        if ($lastDateRecord) {

            $lastDate = $lastDateRecord->updated_at->format('d/m/Y');

        } else {

            $lastDate = '';

        }


        $pessoas = Pessoa::paginate(15);

        return view('pages.home' , ['pessoas' => $pessoas,'userLogged'=> $userLogged, 'path'=> $path, 'lastDate' => $lastDate]);

    }

    public function colaboradorPage ($id){

        if (Auth::check()) {
            $userLogged = Auth::user()->name;
        } else {
            $userLogged = "Guest";
        }

        $path= Request::path();

        $path = explode("/", $path);

        $path = $path[0];

        if($path === 'colaborador'){

            $path = 'colaboradorPage';
        }else{

        }

        $lastDateRecord = Pessoa::latest('updated_at')->first();

        if ($lastDateRecord) {

            $lastDate = $lastDateRecord->updated_at->format('d/m/Y');

        } else {

        }

        $pessoa = Pessoa::findOrFail($id);

        return view('pages.colaboradorPage' , ['pessoa' => $pessoa,'userLogged'=> $userLogged, 'path'=> $path, 'lastDate'=> $lastDate]);

    }

    public function editarColaboradorPage ($id){

        if (Auth::check()) {
            $userLogged = Auth::user()->name;
        } else {
            $userLogged = "Guest";
        }

        $path= Request::path();

        $path = explode("/", $path);

        $path = $path[0];

        $lastDateRecord = Pessoa::latest('updated_at')->first();

        if ($lastDateRecord) {

            $lastDate = $lastDateRecord->updated_at->format('d/m/Y');

        } else {

        }

        $pessoa = Pessoa::findOrFail($id);

        $departamentos = Departamento::all();

        $unidades = Unidade::all();

        return view('pages.editarColaboradorPage' , ['pessoa' => $pessoa,'userLogged'=> $userLogged, 'departamentos'=> $departamentos,'path'=> $path, 'unidades' => $unidades,'lastDate' => $lastDate ]);

    }

    public function editarColaborador (Requests $request){



        $data = $request -> all();

        Pessoa::findOrFail($request -> id) -> update($data);

        return redirect('/colaborador/'.$request -> id)->with('msg','Colaborador alterado com sucesso');

    }

    public function novoColaboradorPage (){


        if (Auth::check()) {
            $userLogged = Auth::user()->name;
        } else {
            $userLogged = "Guest";
        }


        $lastDateRecord = Pessoa::latest('updated_at')->first();

        if ($lastDateRecord) {

            $lastDate = $lastDateRecord->updated_at->format('d/m/Y');

        } else {

        }
        $path= Request::path();

        $departamentos = Departamento::all();

        $unidades = Unidade::all();

        return view('pages.novoColaborador',['departamentos'=> $departamentos, 'userLogged'=> $userLogged, 'unidades' => $unidades, 'path'=>$path, 'lastDate'=> $lastDate] );

    }

    public function novoPostPage (){

            $user = Auth::user();

            $userName = $user->name;

        return view('pages.novoPost', ['userName' => $userName]);
    }

    public function novoColaborador(Requests $request){


        $ramal = $request->Ramal;

        $existingRecord = Pessoa::where('Ramal', $ramal)->first();

        if ($existingRecord) {
            return redirect()->back()->with('msg', 'Já existe um(a) colaborar(a) com este ramal.');
        }

        $pessoa = new Pessoa();

        $pessoa -> Nome = $request -> Nome;
        $pessoa -> Funcao = $request -> Funcao;
        $pessoa -> Ramal = $request -> Ramal;
        $pessoa -> Whatsapp = $request -> Whatsapp;
        $pessoa -> Email = $request -> Email;
        $pessoa -> Departamento = $request -> Departamento;
        $pessoa -> Unidade = $request -> Unidade;
        $pessoa -> Skype = $request -> Skype;


        $pessoa -> save();

        return redirect('/geral')-> with('msg','Colaborador cadastrado(a) com sucesso');
    }

    public function novoPost(Requests $request){

        $post = new Post();

        $post -> titulo = $request -> titulo;
        $post -> autor = $request -> autor;
        $post -> tipo = $request -> tipo;
        $post -> tags = $request -> tags;
        $post -> categorias = $request -> categorias;
        $post -> conteudo = $request -> conteudo;


        if ($request -> hasFile('imagePost') && $request->file('imagePost')->isValid()){

            $requestImage = $request -> imagePost;

            $extension = $requestImage -> extension();

            $imageName = md5($requestImage -> getClientOriginalName() . strtotime("now")) . "." . $extension;

            $request-> imagePost -> move(public_path('imagens/post'), $imageName);

            $post -> imagePost = $imageName;

        }


        $post -> save();

        return redirect('/portal-colaborador')-> with('msg','Post cadastrado com sucesso cadastrado(a) com sucesso');
    }

    public function excluirColaborador($id){


        $pessoa = Pessoa::findOrFail($id);

        $id = $pessoa -> id;

        Pessoa::findOrFail($id)->delete();

        return redirect('/chiaperini' )->with('msg','Colaborador excluído(a) com sucesso');
    }

    /*
    public function ramaisPage (){

        if (Auth::check()) {
            $userLogged = Auth::user()->name;
        } else {
            $userLogged = "Guest";
        }

        $lastDateRecord = Pessoa::latest('updated_at')->first();

        if ($lastDateRecord) {

            $lastDate = $lastDateRecord->updated_at->format('d/m/Y');

        } else {

        }

        $path= Request::path();

        $search = "ola";

        $pessoas = Pessoa::paginate(15);

        $all = Pessoa::all()->toArray();



        return view('pages.ramais' , [
            'pessoas' => $pessoas, 'search'=> $search,
            'path' => $path,
            'lastDate' => $lastDate,
            'userLogged' => $userLogged

        ]);



    } */

    public function ramaisPage (){

        if (Auth::check()) {
            $userLogged = Auth::user()->name;
        } else {
            $userLogged = "Guest";
        }

        $lastDateRecord = Pessoa::latest('updated_at')->first();

        if ($lastDateRecord) {
            $lastDate = $lastDateRecord->updated_at->format('d/m/Y');
        } else {
            $lastDate = null; //
        }

        $path = Request::path();
        $search = "ola";

        $pessoas = Cache::rememberForever('pessoas', function () {
            return Pessoa::paginate(15);
        });

        return view('pages.ramais', [
            'pessoas' => $pessoas,
            'search' => $search,
            'path' => $path,
            'lastDate' => $lastDate,
            'userLogged' => $userLogged
        ]);
    }
}
