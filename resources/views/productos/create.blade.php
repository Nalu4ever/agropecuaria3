@extends('layouts.master')
@section('content')
    <div class="categories-container">
        <form action="{{route('productos.store')}}" class="categorie-form" method="POST">
            @csrf
            <label for="producto" class="category-label label">Producto</label>
            <input type="text" class="input input-category" name="producto" placeholder="Ingresar Nombre de Producto" value="{{old('producto')}}">

            <label for="precio" class="category-label label">Precio</label>
            <input type="number" class="input input-category" name="precio" placeholder="Ingresar Precio de producto" value="{{old('precio')}}">

            <label for="cantidad" class="category-label label">Cantidad</label>
            <input type="number" class="input input-category" name="cantidad" placeholder="Ingresar Cantidad de producto" value="{{old('cantidad')}}">

            <label for="categoria" class="category-label label">Selecione la categoria</label>
            <select name="categoria" class="form-control" value="{{old('categoria')}}">
                @foreach ($categorias as $category )
                <option value="{{$category->id}}">{{$category->nombre_categoria}}</option>
                @endforeach
            </select>
            <button class="btn send-btn">
                Guardar
            </button>
        </form>
    </div>
@endsection
