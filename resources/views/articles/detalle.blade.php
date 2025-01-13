@extends('plantilla.principal')
@section('titulo')
Detalle de Artículo
@endsection
@section('cabecera')
Detalle de Artículo
@endsection
@section('contenido')

<div class="mx-auto w-1/3 rounded-xl p-6 bg-gray-200 border border-gray-200 shadow-xl hover:bg-gray-300 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">

    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$article->nombre}}</h5>
    <p class="font-normal text-gray-700 dark:text-gray-400">{{$article->descripcion}}</p>
    <p class="my-4 font-bold text-gray-700 dark:text-gray-400 mt-3">
        Categoría: <span class="p-2 rounded-xl" style="background-color:{{$article->category->color}};">
        {{$article->category->nombre}}
        </span>
    </p>

    <div @class([
        'mt-2 w-full text-center p-2 rounded-xl font-bold text-white',
        'bg-red-500' =>$article->disponible == 'NO',
        'bg-green-500' =>$article->disponible == 'SI',
        ])>
        El artículo {{$article->disponible}} está disponible.

    </div>
    <div class="flex flex-row-reverse mt-2">
        <a href="{{route('articles.index')}}" class="p-2 rounded-xl bg-green-600 hover:bg-green-800">
            <i class="fas fa-backward mr-4"></i>VOLVER
        </a>
    </div>
</div>

@endsection