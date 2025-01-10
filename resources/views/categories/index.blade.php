@extends('plantilla.principal')
@section('titulo')
Categorías
@endsection
@section('cabecera')
Lista de Categorías
@endsection
@section('contenido')


<div class="relative overflow-x-auto">
    <i class="fas fa-add text-xl text-blue-500 bg-green-500 rounded-xl font-bold hover:bg-green-700 shadow-xl">
        <a href="{{route('categories.create')}}">NUEVO</a>
    </i>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nombre
                </th>
                <th scope="col" class="px-6 py-3">
                    Color
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categorias as $item)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$item->nombre}}
                    </th>
                    <td class="px-6 py-4">
                        <div class="p-2 rounded-xl w-32" style="background-color: {{$item->color}};">&nbsp;</div>    
                    </td>
                    <td class="px-6 py-4">
                        <form method="POST" action="{{route('categories.destroy', $item)}}">
                            @csrf
                            @method('DELETE')
                                <a href="{{route('categories.edit', $item)}}">
                                    <i class="fas fa-edit text-xl text-green-500">
                                    </i>
                                </a>
                            <button type="submit" class="fas fa-trash text-xl text-red-500"></button>
                        </form>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>
</div>

@endsection
@section('alertas')
@endsection