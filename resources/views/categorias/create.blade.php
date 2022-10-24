@extends('layouts.master')
@section('content')
    <div class="categories-container">
        <form action="{{route('categorias.store')}}" class="categorie-form" method="POST">
            @csrf
            <label for="name" class="category-label label">Nombre categoria*</label>
            <input type="text" class="input input-category" name="name" placeholder="Ingresar nombre de categoria" value="{{old('name')}}">
            <button class="btn send-btn">
                Agregar
            </button>
        </form>
    </div>
@endsection
