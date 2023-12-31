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


    
        <main class="login">


            <div class="container">

                @if(session('msg'))
                    <p id="msg">{{session('msg')}}</p>
                @endif

                @yield('content')

            </div>

        </main>
     

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