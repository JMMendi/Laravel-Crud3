@extends('plantilla.principal')
@section('titulo')
Listado de Artículos
@endsection
@section('cabecera')
Lista Artículos
@endsection
@section('contenido')


<div class="relative overflow-x-auto">
    <i class="fas fa-add text-xl text-blue-500 bg-green-500 rounded-xl font-bold hover:bg-green-700 shadow-xl">
        <a href="{{route('articles.create')}}">NUEVO</a>
    </i>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Detalle
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Categoría
                </th>
                <th scope="col" class="px-6 py-3">
                    Disponible
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($articulos as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    <a href="{{route('articles.show', $item)}}">
                        <i class="fa-solid fa-info text-blue-500 text-xl"></i>
                    </a>
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$item->nombre}}
                </th>
                <td class="px-6 py-4">
                    <div class="p-2 rounded-xl text-white font-bold" style="background-color:{{$item->category->color}};">
                        {{$item->category->nombre}}
                    </div>
                </td>
                <td class="px-6 py-4">
                    {{$item->disponible}}
                </td>
                <td class="px-6 py-4">
                    <form method="POST" action="{{route('articles.destroy', $item)}}">
                        @csrf
                        @method("DELETE")
                        <a href="{{route('articles.edit', $item)}}">
                            <i class="fas fa-edit text-green-500 text-xl"></i>
                        </a>
                        <button type="submit">
                            <i class="fas fa-trash text-gray-500 text-xl"></i>
                        </button>
                    </form>
                </td>
            </tr>   
            @endforeach
            
        </tbody>
    </table>
    <div class="mt-2">
        {{$articulos->links()}}
    </div>
</div>

@endsection
@section('alertas')
@endsection