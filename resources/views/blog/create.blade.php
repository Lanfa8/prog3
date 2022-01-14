@extends('templates.base')
@section('title', 'Inserir Post')
@section('h1', 'Inserir Post no blog')

@section('content')
<div class="row">
    <div class="col-4">

        {{-- enctype utilizado para permitir o envio de arquivos --}}
        <form method="post" action="{{ route('blog.gravar') }}" enctype="multipart/form-data">
            @csrf
            {{-- input para o titulo --}}
            <div class="mb-3">
                <label for="nome" class="form-label">Título</label>
                <input type="text" class="form-control" id="nome" name="titulo">
            </div>
            
            {{-- input para a descricao --}}
            <div class="mb-3">
                <label for="comentario" class="form-label">Descricao</label>
                <textarea class="form-control" id="comentario" name="descricao" rows="3"></textarea>
            </div>

            {{-- input para a descricao --}}
            <div class="mb-3">
                <p>Associar imagem: <input type="file" name="imagem"></p>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>

    </div>
</div>
@endsection