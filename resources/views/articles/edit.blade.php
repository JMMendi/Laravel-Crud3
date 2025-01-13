@extends('plantilla.principal')
@section('titulo')
Edición de Artículo
@endsection
@section('cabecera')
Editar Artículo
@endsection
@section('contenido')

<div class="p-4 w-1/2 mx-auto rounded-xl shadow-xl bg-gray-100">
    <form class="max-w-sm mx-auto" method="POST" action="{{route('articles.update', $article)}}">
        @csrf
        @method("PUT")
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre del Artículo</label>
            <input type="text" name="nombre" id="nombre" value="{{@old('nombre', $article->nombre)}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
            @error('nombre')
            <x-error>{{$message}}</x-error>
            @enderror
        </div>
        <div class="mb-5">
            <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción del artículo</label>
            <textarea name="descripcion" id="descripcion">{{@old('descripcion', $article->descripcion)}}</textarea>    
            @error('descripcion')
            <x-error>{{$message}}</x-error>
            @enderror
        </div>
        <div class="mb-5">
            <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría del artículo</label>
            <select id="category_id" name="category_id">
                <option value="">Seleccione la categoría</option>
                @foreach ($categorias as $item)
                <option value="{{$item->id}}" @selected(@old('category_id', $article->category_id) == $item->id)>{{$item->nombre}}</option>  
                @endforeach
            </select>
            @error('category_id')
            <x-error>{{$message}}</x-error>
            @enderror
        </div>

        <div class="mb-5">
            <label for="disponible" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disponibilidad</label>
            <input type="radio" @checked(@old('disponible', $article->disponible) == 'SI') name="disponible" value="SI" class="mr-2" />Sí &nbsp;&nbsp;
            <input type="radio" @checked(@old('disponible', $article->disponible) == 'NO') name="disponible" value="NO" class="mr-2" />No
            @error('disponible')
            <x-error>{{$message}}</x-error>
            @enderror
        </div>

        <div class="flex justify-between">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i class="fas fa-edit">&nbsp;Editar</i>
            </button>
            <button class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                <i class="fas fa-cancel">
                    <a href="{{route('articles.index')}}">&nbsp;Volver</a>
                </i>
            </button>
        </div>
    </form>

</div>


@endsection