@extends('plantilla.principal')
@section('titulo')
Editar Categoría
@endsection
@section('cabecera')
Edición Categoría
@endsection
@section('contenido')

<div class="p-2 rounded-xl w-1/2 mx-auto border-2 border-black shadow-xl">
    <form class="max-w-sm mx-auto" method="POST" action="{{route('categories.update', $category)}}">
        @csrf
        @method('PUT')
        <div class="mb-5">
            <label for="nombre" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre de la Categoría</label>
            <input type="text" value="{{@old('nombre', $category->nombre)}}" name="nombre" id="nombre" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
            @error('nombre')
            <x-error>
                {{$message}}
            </x-error>
            @enderror
        </div>
        <div class="mb-5">
            <label for="color" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Color de la Categoría</label>
            <input type="color" value="{{@old('color', $category->color)}}" name="color" id="color" />
            @error('color')
            <x-error>
                {{$message}}
            </x-error>
            @enderror
        </div>
        <div class="flex justify-between">
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <i class="fas fa-save">&nbsp;Editar</i>
            </button>
            <button class="text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:outline-none focus:ring-purple-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-800">
                <i class="fas fa-cancel">
                    <a href="{{route('categories.index')}}">&nbsp;Volver</a>
                </i>
            </button>
        </div>
    </form>
</div>


@endsection
