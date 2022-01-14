@extends('templates.base')
@section('title', 'Visualizar post')

@section('content')
{{-- mais simples possível --}}
<h1>{{ $post->titulo }}</h1>
<p><img src="{{asset('img/' . $post->imagem)}}"></p>
<p>{{ $post->descricao }}</p>
@endsection