@extends('layouts.main')
@section('content')
<div id="msg">Colaborador alterado com sucesso</div>



    <div class="colaborador">

        
        <ul class="dados">

            <li class="group">
                
                <span class="labelCampo">Colaborador</span>

                <span class="valorCampo">{{$pessoa -> Nome}}</span>

            </li>
            <li class="group">
                
                <span class="labelCampo">Idade</span>
                
                <span class="valorCampo">22 Anos</span>

            </li>
            <li class="group action">
                
                <span class="labelCampo">Ramal: {{$pessoa -> Ramal}}</span>
                
                <!-- a class="valorCampo"  onclick="ligar()"></a -->

                <a  href="tel:{{$pessoa -> Ramal}}">Ligar</a>

            </li>  
            <li class="group action">
                
                <span class="labelCampo">Skype</span>
                
                @if($pessoa -> Skype != '') 

                    <a target="_blank" href="{{$pessoa -> Skype}}">Conversar</a>

                @else

                    <span class="valorCampo">Não possui</span>
                    
                @endif
                


            </li>   
            <li class="group action">
                
                <span class="labelCampo">Whatsapp</span>
                @if($pessoa -> Whatsapp != '') 
                <a target="_blank" href="https://api.whatsapp.com/send?phone={{$pessoa -> Whatsapp}}"> Contatar</a>

                @else
                    <span class="valorCampo">Não possui</span>
                @endif
            

            </li>    
            
            <li class="group">
                
                <span class="labelCampo">Unidade</span>
                
                <span class="valorCampo">{{$pessoa -> Unidade}}</span>

            </li>    
            <li class="group ">
                
                <span class="labelCampo">Departamento</span>
                
                <span class="valorCampo">{{$pessoa -> Departamento}}</span>

            </li>
            @auth    
            <li class="group lastGroup">
                
                <a class="btnSimples" href="/editar-colaborador/{{$pessoa -> id}}">Editar</a>
                
            </li>
            @endauth  
                       

        </ul>

        <div class="infoExtras">

            <div class="infoColaborador">

                <span class="historico">

                    <h2>Um pouco sobre a tragetória</h2>
                    
                    <p>Contrary to popular belief, Lorem Ipsum is not simply random text. 
                        It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor 
                         </p>


                </span>

                <span class="funcao">

                    <h2>A importância para a empresa</h2>
                    
                    <p>
                        Contrary to popular belief, Lorem Ipsum is not simply random text. 
                        It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor 
                    </p>


                </span>

                <span class="trabalhando">

                    <h2>Fotos</h2>
                    
                    <img src="" />


                </span>

            </div>

        </div>

    </div>


    <script>



        var ramal = document.getElementById("ramal");

        var ramalNum = document.getElementById("ramalNum");


        function ligar ( ){

            if (ramal.style.display === 'none') {
                
                ramal.style.display = 'flex';
                ramalNum.style.display = 'none';

            }else{

                ramal.style.display = 'none';
                ramalNum.style.display = 'flex';

            }
        }


    </script>

@endsection