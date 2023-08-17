@extends('layouts.main')
@section('content')

    <div class="novoColaborador">

        <form action="/registrar-colaborador" method="post" enctype="multipart/form-data">

            @csrf

            
            <div class="group">

                <label for="Nome" class="campo">Nome do colaborador <p>(Obrigatório)</p></label>
                <input type="text"  name="Nome" class="valor" required>

            </div>
            
            <div class="group">

                <label for="Ramal" class="campo">Ramal <p>(Obrigatório)</p></label>
                <input type="text" name="Ramal" class="valor" required>

            </div>

            <div class="group">

                <label for="Whatsapp" class="campo">Whatsapp</label>
                <input type="text" name="Whatsapp" class="valor">

            </div>

            <div class="group">

                <label for="Departamento" class="campo">Departamento <p>(Obrigatório)</p></label>
               
                <select name="Departamento" class="valor" required>

                    <option value="">Selecione</option>

                    @foreach($departamentos as $departamento)

                    <option value="{{$departamento -> nomeDepartamento}}">{{$departamento -> nomeDepartamento}}</option>

                    @endforeach
                    
                </select>
            </div>

            <div class="group">

                <label for="Skype" class="campo">Skype</label>
                <input type="text" name="Skype" class="valor">

            </div>

            <div class="group">

                <label for="Unidade" class="campo">Unidade <p>(Obrigatório)</p></label>
                <select class="valor" name="Unidade" required>

                    <option value="Selecione">Selecione</option>
                    @foreach($unidades as $unidade)

                    <option value="{{$unidade -> nomeUnidade}}">{{$unidade -> nomeUnidade}}</option>

                    @endforeach

                </select>

            </div>

            <div class="botoes">

                <a class="btnSimples" href="/chiaperini">Cancelar</a>
                <button class="btnSimples" type="submit" >Criar</button>

            </div>

         

        </form>
        
    </div>

@endsection