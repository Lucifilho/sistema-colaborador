<input wire:model="search" type="text" placeholder="Search users..."/>


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
        <tr><td>{{$pessoa -> Ramal}}</td><td>{{$pessoa -> Nome}}</td><td>{{$pessoa -> Whatsapp}}</td><td>{{$pessoa -> Departamento}}</td><td>{{$pessoa -> Unidade}}</td><td><a class="btnLigar" href="tel:{{$pessoa -> ramal}}">Ligar</a></td></tr>
    @endforeach

    @foreach($pessoas as $pessoa)
        <li>{{ $pessoa-> nome }}</li>
    @endforeach


    </tbody>

</table>