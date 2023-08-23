@extends('layouts.colaborador')
@section('content')

    <div class="novoColaborador">

        <form action="/novo-post" method="post" enctype="multipart/form-data">

            @csrf

            
            <div class="group">

                <label for="titulo" class="campo">Titulo do Post <p>(Obrigatório)</p></label>
                <input type="text"  name="titulo" class="valor" required>

            </div>
        

            <div class="group">
                <label for="tags" class="campo">Tags</label>
                <input type="text" name="tags" class="valor" data-role="tagsinput">
            </div>

            <div class="grupo">

                <label for="imagePost">Adicionar imagem:</label>
                <input type="file" name="imagePost" id="imagePost" class="from-control-file">

            </div>
            <div class="group">

                <label for="conteudo" class="campo">Conteúdo</label>
                <textarea type="text" name="conteudo" class="valor"></textarea>

            </div>


            <div class="group">

                <label for="categorias" class="campo">Categorias</label>
               
                <select name="categorias" class="valor">

                    <option value="Sem categoria">Selecione</option>
                    

                                    
                    
                </select>
            </div>

            <div class="group">

                <label for="tipo" class="campo">Tipo de post</label>
                <select class="valor" name="tipo" required>

                    <option value="">Selecione</option>
                    <option value="Noticia">Noticia</option>   
                    <option value="Lançamento">Lançamento</option>              
           

                </select>

            </div>

            <input type="hidden" name="autor" value="{{ $userName}}" required class="valor">


            <div class="botoes">

                <a class="btnSimples" href="/chiaperini">Cancelar</a>
                <button class="btnSimples" type="submit" >Criar</button>

            </div>

         

        </form>
        
    </div>

    <!-- Initialize the bootstrap-tagsinput input field -->
    <script>
        $(document).ready(function () {
            $('input[data-role="tagsinput"]').tagsinput();
        });
    </script>



@endsection