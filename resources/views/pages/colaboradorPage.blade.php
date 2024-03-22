@extends('layouts.main')
@section('content')

<div class="assinatura"  id="signatureToDownload">
                

    <html>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
        <body>
            <div style="width:460px">
            <p style="font-family: Arial;font-size:20px;color:#313b6c;font-weight:700;">{{$pessoa -> Nome}}<br>
                <span style="font-size:14px;font-weight:400;font-style: italic;">{{$pessoa -> Funcao}}</span>
            </p>
            <br>
                <table>
                    <td width="100%" >
                        @if($pessoa -> Unidade === 'Chiaperini')
                        
                        <img src="http://www.chiaperini.com.br/assinatura-de-email/img/chiaperini.jpg" title="Chiaperini" alt="Chiaperini" width="250px" >
                        
                        @elseif( $pessoa -> Unidade === 'Techto')
                        
                        <img src="https://techto.com.br/wp-content/uploads/2019/02/logo-techto.png" title="Chiaperini" alt="Chiaperini" width="250px" >
                        
                        @elseif( $pessoa -> Unidade === 'Chiaperini Pro')

                        <img src="https://chiaperinipro.com.br/wp-content/uploads/2022/07/Chiaperini_Pro_Logo-300x110.webp" title="Chiaperini" alt="Chiaperini" width="250px" >
                        
                        @elseif( $pessoa -> Unidade === 'FNC')

                        <img src="https://files-fundicaonatividade.s3.amazonaws.com/files/Fundicao-Natividade-Chiaperini-Icone-300x300.webp" title="Chiaperini" alt="Chiaperini" width="250px" >
                        
            
                        @elseif( $pessoa -> Unidade === 'Mercadão Lojista')

                        <img src="https://cdn.awsli.com.br/400x300/718/718365/logo/03d33c1390.png" title="Chiaperini" alt="Chiaperini" width="250px" >
                        
                        
                        @elseif( $pessoa -> Unidade === 'techtoPel')
                        
                        <img src="https://chramais.s3.amazonaws.com/images/techtopelLogo.png" title="Techtopel" alt="Techtopel" width="180px" >

                        @else

                        <img src="http://www.chiaperini.com.br/assinatura-de-email/img/chiaperini.jpg" title="Chiaperini" alt="Chiaperini" width="250px" >

                        @endif
                    </td>
                    <td width="160px">
                        <table cellpadding="2" cellspacing="0" style="font-family: Arial;font-size:12px;color:#313b6c;font-weight:600;">
                            <tr>
                                <td><img src="http://www.chiaperini.com.br/assinatura-de-email/img/email.jpg" alt="Email" width="16px" height="16px"></td>
                                <td>&nbsp;&nbsp;{{$pessoa -> Email}}</td>
                            </tr>
                            <tr>
                                <td><img src="http://www.chiaperini.com.br/assinatura-de-email/img/telefone.jpg" alt="Telefone Chiaperini" width="16px" height="16px"></td>
                                <td>&nbsp;&nbsp;(16) 3954 9400 -  Ramal {{$pessoa -> Ramal}}</td>
                            </tr>
                            <tr>
                                <td><img src="http://www.chiaperini.com.br/assinatura-de-email/img/site.jpg" alt="Site Chiaperini" width="16px" height="16px"></td>
                                <td>&nbsp;&nbsp;www.{{$pessoa -> Unidade}}.com.br</td>
                            </tr>	
                        </table>
                    </td>
                </table>
                <br>
            </div>
        </body>
    </html>

</div>

<div class="colaborador">

    <div class="lista">
    
        <ul class="dados">

            <li class="group">
                
                <span class="labelCampo">Colaborador</span>

                <span class="valorCampo" id="nomeColaborador">{{$pessoa -> Nome}}</span>

            </li>
            <li class="group">
                
                <span class="labelCampo">Função</span>

                <span class="valorCampo">{{$pessoa -> Funcao}}</span>

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
                <a target="_blank" href="https://api.whatsapp.com/send?phone=55{{$pessoa -> Whatsapp}}"> Contatar</a>

                @else
                    <span class="valorCampo">Não possui</span>
                @endif
            

            </li>    
            <li class="group action">
                
                <span class="labelCampo">Email</span>
                @if($pessoa -> Email != '') 
                <a href="mailto:{{$pessoa -> Email}}"> Mensagem</a>

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

        </ul>

        @auth    
            <div class="actions">

                <a  class="btnSimples" id="downloadButton">Gerar assinatura</a>

                
                <a class="btnSimples" href="/editar-colaborador/{{$pessoa -> id}}">Editar</a>
                
            </div>
        @endauth  

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

       
        document.addEventListener("DOMContentLoaded", function () {
        const downloadButton = document.getElementById("downloadButton");
        const signatureToDownload = document.getElementById("signatureToDownload");
        const nomeColaborador = document.getElementById("nomeColaborador").textContent;

        downloadButton.addEventListener("click", function () {
            const htmlContent = signatureToDownload.outerHTML;
            downloadFile(htmlContent, nomeColaborador.toString() + ".htm");
        });

        function downloadFile(content, fileName) {
            const blob = new Blob([new Uint8Array([0xEF, 0xBB, 0xBF]), content], { type: "text/html;charset=utf-8" });
            const url = URL.createObjectURL(blob);
            const link = document.createElement("a");
            link.href = url;
            link.download = fileName;
            link.click();
            URL.revokeObjectURL(url);
        }
    });
    </script>

@endsection