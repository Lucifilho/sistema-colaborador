<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="/css/style.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.3.0/chart.min.js" integrity="sha512-mlz/Fs1VtBou2TrUkGzX4VoGvybkD9nkeXWJm3rle0DPHssYYx4j+8kIS15T78ttGfmOjH0lLaBXGcShaVkdkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        @livewireStyles


        <title>Portal do colaborador</title>

    </head>
    <body class="body">


        <header class="{{$path}}">

            @auth

                <div id="menuBarra"> 

                    <i id="barraMenu" onclick="colunaMenu()" class="fa fa-bars"></i>
                    <i id="menuClose" onclick="colunaMenu()" class="fa fa-close"></i>

                </div>

            @endAuth

            @auth
            
            <nav id="columnMenu">

                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/">Home</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/geral">Geral</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/chiaperini">Chiaperini</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/chiaperini-pro">Chiaperini Pro</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/fnc">FNC</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/mercadao-lojista">Mercadão Lojista</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/techto">Techto</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/techtopel">TechtoPel</a>

                @auth <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/registrar-colaborador">Registrar colaborador</a> @endAuth
                
            </nav>

            @elseGuest

            <nav class="nav" >

                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/chiaperini">Chiaperini</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/chiaperini-pro">Chiaperini Pro</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/fnc">FNC</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/mercadao-lojista">Mercadão Lojista</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/techto">Techto</a>
                <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/techtopel">TechtoPel</a>
                @auth <a class="@auth nav-link-menu @elseguest nav-link @endAuth" href="/registrar-colaborador">Registrar colaborador</a> @endAuth
                
            </nav>
            @endAuth
            <div class="linksEmergencia">

                @auth


                <div class="dashCall">

                    <h1>Olá, {{$userLogged}}</h1>
                    
                    <div class="menuBox">

                        <i id="setaMenu" class="fa fa-angle-down" onclick="dashMenu()" aria-hidden="true"></i>

                        <ul id="menuDrop">
    
                            <li class="menu-item"><a href="/dashboard">Configurações</a> </li>

                            <li class="menu-item">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <a
                                       href="/logout"
                                       onclick="event.preventDefault();
                                       this.closest('form').submit();"
        
                                    >Sair</a>
                                </form>
                            </li>
    
                        </ul>
                    </div>
                    

                </div>
                
                


                @elseguest

                <a class="home" href="/"><i class="fa-solid fa-home"></i><span>Home</span> </a>

                @endAuth



                @if ($path == 'chiaperini')

                    
                    <a class="portaria" href="tel:7212"><i class="fa-solid fa-phone"></i><span>Telefonista</span> </a>

                    <a class="portaria" href="tel:7262"><i class="fa-solid fa-phone-volume"></i><span>SAC</span> </a>

                    <a class="brigada" href="tel:7264"><i class="fa-solid fa-fire-flame-curved"></i><span>Brigada de incêndio</span> </a>


                   
                @elseif($path == 'techto')
                
                    <a class="portaria" href="tel:6000"><i class="fa-solid fa-phone"></i><span>Portaria</span> </a>   

                    <a class="brigada" href="tel:7264"><i class="fa-solid fa-fire-flame-curved"></i><span>Brigada de incêndio</span> </a>

                @elseif($path == 'chiaperini-pro')
  
                    <a class="portaria" href="tel:7212"><i class="fa-solid fa-phone"></i><span>Telefonista</span> </a>

                    <a class="brigada" href="tel:7264"><i class="fa-solid fa-fire-flame-curved"></i><span>Brigada de incêndio</span> </a>

                @elseif($path == 'mercadao-lojista')

                    <a class="portaria" href="tel:6000"><i class="fa-solid fa-phone"></i><span>Portaria</span> </a>
                    
                    <a class="brigada" href="tel:7264"><i class="fa-solid fa-fire-flame-curved"></i><span>Brigada de incêndio</span> </a>

                @elseif($path == 'fnc')

                
                    <a class="portaria" href="tel:6000"><i class="fa-solid fa-phone"></i><span>Portaria</span> </a>
                    <a class="brigada" href="tel:7264"><i class="fa-solid fa-fire-flame-curved"></i><span>Brigada de incêndio</span> </a>

                @endif

                


                
            </div>
        </header>
        <main class="{{$path}}">

         

            <div class="container">

                @if(session('msg'))
                    <p id="msg">{{session('msg')}}</p>
                @endif

                @yield('content')

            </div>

        </main>
        <footer class="{{$path}}">

            <div class="aviso">

                <span class="help">
                    Caso algum ramal esteja incorreto, por favor informar a recepção.<br> Ultima atualização em:     {{$lastDate}}
                    .
                </span>
        
            </div>

            @if($path === 'index' || $path === 'suporte')

            <div class="icones">

                <!--a href="suporte.html" >
                    <img class="suportIcon" src="/assets/icons/support_508190.png" alt="">
                    <span>Suporte </span>
                </a -->
        
                <a class="brigada" href="tel:7264">
                    <i class="fa-solid fa-fire-flame-curved"></i>
                    <span>Brigada de incêndio</span> 
                </a>
    
            </div>
            
            @else
            <div class="atalhos">
        
        
                <img src="/imagens/ATALHOS MICROSIP (1).png">
        
            </div>
            @endif
        
            <div class="version">

                <span class="number">V 3.6.2</span>

            </div>
            

        </footer>

        @livewireScripts

        <script>

            var msg = document.getElementById("msg");
            var menuColuna = document.getElementById('columnMenu')
            var barraMenu = document.getElementById('barraMenu')
            var menuClose = document.getElementById('menuClose')
            var menuDrop = document.getElementById('menuDrop')
            var setaMenu = document.getElementById('setaMenu')



            function colunaMenu(){

                if(menuColuna.style.display === "flex"){

                    menuColuna.style.display = "none";
                    barraMenu.style.display = "flex";
                    menuClose.style.display = "none";

                }else{

                    menuColuna.style.display = "flex";
                    barraMenu.style.display = "none";
                    menuClose.style.display = "flex";


                }
            }

            function dashMenu(){

                if(menuDrop.style.display === "flex"){

                    menuDrop.style.display = "none";
                    setaMenu.style.transform = "rotate(0deg)";                  

                }else{

                    menuDrop.style.display = "flex";
                    setaMenu.style.transform = "rotate(180deg)";                  

                   


                }
            }

            setTimeout(function(){hide(msg);}, 3800);
            function hide(element){
            element.style.display="none";
            }

        </script>

    </body>
</html>