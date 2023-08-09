<div class="bladeRamal">

    <div class="cabecalho">    
        
        <h1 class="title1">Lista de Ramais</h1>
    
    </div>

    <div class="pesquisa">
        
        <input wire:model="search" type="text" class="form-control" placeholder="Digite aqui, Nome, Ramal, Departamento, ou Unidade do colaborador"/>
       
        @if ($search)
            <span class="msg">Buscando por: {{$search}}</span>            
        @endif
    </div>



    <table id="tabelaDados" class="table table-bordered table-hover table-striped">
    
        <thead>
            <tr>
                <th class="firstTh">Ramal</th>
                <th>Nome</th>
                <th>Whatsapp</th>
                <th>Departamento</th>
                <th>Unidade</th>
                <th class="lastTh">Ligar via Microsip</th>
            </tr>
        </thead>
    
        <tbody><!-- Aqui você pode adicionar as linhas da tabela. -->
    
            @foreach($pessoas as $pessoa)    
                <tr><td>{{$pessoa -> Ramal}}</td><td>
                    
                    @auth
                    <a href="/colaborador/{{$pessoa -> id}}">{{$pessoa -> Nome}}</a>
                    @elseguest
                    {{$pessoa -> Nome}}
                    @endguest
                
                
                </td><td>{{$pessoa -> Whatsapp}}</td><td>{{$pessoa -> Departamento}}</td><td>{{$pessoa -> Unidade}}</td><td><a class="btnLigar" href="tel:{{$pessoa -> ramal}}">Ligar</a></td></tr>
            @endforeach
        
        
        </tbody>
    
    </table>
    <div>

    @if(count($pessoas)==0 && $search)

            <span class="msg">Nenhum resultado encontrado com {{$search}}</span>

        @elseif(count($pessoas)==0)

            <span class="msg">Nenhum resultado registrado ainda</span>

        @endif
      
            <div class="navigation">

                {{$pessoas -> links()}}

            </div>

        </div>
</div>
