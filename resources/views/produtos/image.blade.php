@extends('templates.base')
@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" integrity="sha512-0SPWAwpC/17yYyZ/4HSllgaK7/gg9OlVozq8K7rf3J8LvCjYEEIfzzpnA2/SSjpGIunCSD18r3UhvDcu/xncWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="{{ URL::asset('js/cropper.js') }}"></script>
@endpush
@section('title', 'Visualizar produto')

@section('content')



<h1>{{ $prod->nome }}</h1>

<div>
    <img class="w-100" id="img-crop" src="{{asset('img/' . $prod->imagem)}}">
</div>

<form method="post" action="{{ route('image.create', $prod) }}" id="cortar">
    @csrf
    <input type="hidden" name="img" id="img">
    <input type="hidden" name="imgPath" value="{{ $prod->imagem }}">
    <div class="my-3 w-100">
        <button type="submit" value="Cortar" class="btn w-100 btn-primary">Gravar</button>
    </div>
</form>
@endsection
