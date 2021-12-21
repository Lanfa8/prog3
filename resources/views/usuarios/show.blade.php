@extends('templates.base')
@section('title', 'Perfil')
{{-- @section('h1', 'Página de perfil') --}} 

@section('content')

@if (Auth::user()->admin)
    <h1 class="w-100 text-center p-3"> O admin está ONLINE 👀</h1>
@else
    <h1 class="w-100 text-center p-3"> Admin off, liberada a baderna 🎉🎉🎉</h1>
@endif

    <div class='col'>
        <div class="row">
            <div class='col'>
                <h1>{{Auth::user()->nome}}</h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row pt-4" ><h4>{{Auth::user()->email}}</h4></div>
                <div class="row text-muted p-3 pt-0">Email</div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row pt-4" ><h4>{{Auth::user()->usuario}}</h4></div>
                <div class="row text-muted p-3 pt-0">Usuário</div>
            </div>
        </div>
    </div>
    <div class="col">
        <img src="{{asset('/images/user.jpg')}}" alt="Image"/>

    </div>
</div>
<div class="row">
    <div class="col align-right">
        <a href="{{route('profile.edit')}}"><button  class="btn btn-primary">Editar</button></a>    
    </div>
    <div class="col align-right">
        <a href="{{route('profile.password')}}"><button  class="btn btn-warning">Trocar senha</button></a>    
    </div>
</div>
@endsection