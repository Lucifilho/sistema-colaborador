@extends('layouts.main')
@section('content')

    <div class="editarColaborador">

        <form method="post" enctype="multipart/form-data" class="formEdicao" action="/colaborador/{{$pessoa -> id}}">

            @csrf
            @method('PUT')

            <div class="group">

                <label for="Ramal" class="campo">Ramal</label>
                <input type="text" name="Ramal" value="{{$pessoa-> Ramal}}" class="valor">

            </div>
            <div class="group">

                <label for="Nome" class="campo">Nome do colaborador</label>
                <input type="text" name="Nome" value="{{$pessoa-> Nome}}" class="valor">

            </div>

            <div class="group">

                <label for="Whatsapp" class="campo">Whatsapp</label>
                <input type="text" name="Whatsapp" value="{{$pessoa-> Whatsapp}}" class="valor">

            </div>

            <div class="group">

                <label for="Departamento" class="campo">Departamento</label>
                <select name="Departamento" class="valor">

                    <option value="{{$pessoa -> Departamento}}">{{$pessoa -> Departamento}}</option>

                    @foreach($departamentos as $departamento)

                    <option value="{{$departamento -> nomeDepartamento}}">{{$departamento -> nomeDepartamento}}</option>

                    @endforeach
                    
                </select>
            </div>

            <div class="group">

                <label for="Skype" class="campo">Skype</label>
                <input type="text" name="Skype" value="{{$pessoa-> Skype}}" class="valor">

            </div>

            <div class="group">

                <label for="Unidade" class="campo">Unidade</label>
                <select name="Unidade" class="valor">

                    <option value="{{$pessoa -> Unidade}}">{{$pessoa -> Unidade}}</option>

                    @foreach($unidades as $unidade)

                    <option value="{{$unidade -> nomeUnidade}}">{{$unidade -> nomeUnidade}}</option>

                    @endforeach
                    
                </select>
            </div>

            <div class="botoes">
                
                <div class="cima">

                    <a class="btnSimples" href="/colaborador/{{$pessoa -> id}}">Cancelar</a>
                    <button class="btnSimples" type="submit">Salvar</button>

                </div>
                <div class="baixo">


                    <a class="btnSimples" data-toggle="modal" data-target="#exampleModalCenter">
                        Deletar Colaborador
                    </a>

                </div>
                

            </div>

        </form>
        
       
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Deseja excluir o colaborador <strong>{{$pessoa -> Nome}}</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                Se você excluir o colaborador  <strong>{{$pessoa -> Nome}}</strong>, não será possível recuperar os dados dele. Tem certeza que deseja exlui-lo?
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                <form class="formExclusao"  action="/excluir-colaborador/{{ $pessoa -> id}}"  method="POST">


                    @csrf
                    @method('DELETE')
    
                    <div class="botoesExclusao">
            
                        <button class="btn btn-primary" type="submit" >Sim</button>
    
                    </div>
        
                </form>
                </div>
            </div>
            </div>
        </div>
        
        
        
        
    </div>

    <script>

        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })

    </script>

@endsection