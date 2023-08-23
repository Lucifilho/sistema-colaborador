@extends('layouts.colaborador')
@section('content')

<div class="portalColaborador">


    <div class="cabecalho">

        <h1>Portal do colaborador</h1>

        <span>Fique por dentro das novidades da empresa para tornar seu ambiente de trabalho melhor</span>

    </div>
    
    <div class="pesquisa">

        <input type="search" placeholder="Pesquisar" ><a type="submit"><i class="fa fa-search"></i></a>

    </div>


    <ul class="posts">

        @foreach ($posts as $post)
            
        
        <li class="post">

            <a href="/{{$post -> titulo}}/{{$post -> id}}">

                <div class="img">

                    <img class="imagePost" src="/imagens/post/{{ $post-> imagePost }}">

                </div>
                
                <div class="postTexts">

                    <div class="meta">{{$post -> created_at}} - Autor {{$post -> autor}}</div>

                    <h2>{{$post -> titulo}}</h2>

                    <span>Ler mais -></span>
                </div>
            </a>


        </li>
        @endforeach


    </ul>


</div>
    
@endsection