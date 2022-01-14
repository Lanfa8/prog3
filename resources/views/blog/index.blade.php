@extends('templates.base')
@section('title', 'Blog')
@section('h1', 'Esse é o blog')
{{-- testei um css customizado aqui pelo esporte --}}
@push('style')
    <link rel="stylesheet" href="{{ URL::asset('css/main.css') }}" />
@endpush
@section('content')
<div class="row">
    <div class="col">
        <p>Sejam bem-vindos ao blog</p>

        <a class="btn btn-primary" href="{{route('blog.inserir')}}" role="button">Cadastrar post no blog</a>
    </div>
</div>

<div class="col">

    {{-- recebe todos os posts da controller e passa por cada um --}}
    @foreach($posts as $post)
        <div class="row">       
            <div class="card w-100 shadow-sm card-post-blog" style="width: 18rem; margin: 10px">
                <div class="card-body">
                    <a href="{{ route('blog.show', $post) }}">
                        <h5 class="card-title">{{$post->titulo}}</h5>                    
                    </a>
                    <h6 class="card-subtitle mb-2 text-muted">{{$post->created_at}}</h6>
                    <p class="card-text">{{$post->descricao}}</p>
                </div>
            </div>
        </div>
    @endforeach

</div>
@endsection
