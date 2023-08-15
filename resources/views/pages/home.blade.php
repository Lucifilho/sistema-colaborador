@extends('layouts.main')
@section('content')


<div class="indexPage">

        <div class="titulo">

            <h1>
                Sejam bem-vindos à <br>
                <span class="negrito">Lista de ramais 2023.</span>                
            </h1>

        </div>

        <div onclick="menu()" class="escolhas">

            <div class="chose">

                <h2>Selecione a empresa desejada...</h2>

                <a  class="fa-solid fa-chevron-down" id="setaBaixo"></a>

            </div>

            <ul id="listaLinks" style="display: none;">

                <li> <a class="link"  href="geral">Geral</a> </li> 
                <li> <a class="link"  href="chiaperini">Chiaperini Industrial</a> </li> 
                <li> <a class="link"  href="techto">Techto Brasil</a> </li> 
                <li> <a class="link"  href="mercadaolojista">Mercadão Lojista</a> </li> 
                <li> <a class="link"  href="chiaperinipro">Chiaperini PRO</a> </li> 
                <li> <a class="link"  href="techtopel">TechtoPel</a> </li> 
                <li> <a class="link"  href="fnc">Fundição Natividade (FNC)</a> </li>

            </ul>

        </div>

</div>

<script>

    function menu(){

        var menu = document.getElementById("listaLinks");
        var setaBaixo = document.getElementById("setaBaixo");

        
        if (menu.style.display ==='none'){

            menu.style.display='flex';
            setaBaixo.style.transform='rotate(180deg)';

        }else{
            
            menu.style.display='none';
            setaBaixo.style.transform='rotate(3600deg)';

        }

    }



</script>    


@endsection