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
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="/js/graficos.js"></script>
        
        @livewireStyles


        <title>Portal do colaborador</title>

    </head>
    <body class="body">


        <header>

            <nav class="nav">

                <a class="nav-link" href="/chiaperini">Chiaperini</a>
                <a class="nav-link" href="/chiaperinipro">Chiaperini Pro</a>
                <a class="nav-link" href="/techto">Techto</a>
                <a class="nav-link" href="/mercadaolojista">Mercadão Lojista</a>
                <a class="nav-link" href="/fnc">Fundição Natividade</a>
            </nav>
            <div class="linksEmergencia">

                <a class="brigada" href="tel:7264"><i class="fa-solid fa-fire-flame-curved"></i><span>Brigada de incêndio</span> </a>
                
            </div>
        </header>
        <main>

            <div class="container">

                @if(session('msg'))
                    <p class="msg">{{session('msg')}}</p>
                @endif

                @yield('content')

            </div>

        </main>
        <footer class="footer">

            <div class="container">

                <span class="description">Copyright &copy Chiaperini.
                    Todos os direitos reservados a <a  href="https://chiaperinci.com.br/" rel="noopener" target="_blank" >Fairy Dash</a>.
                </span>

            </div>

        </footer>

        @livewireScripts

    </body>
</html>