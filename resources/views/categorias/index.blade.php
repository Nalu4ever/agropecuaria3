@extends('layouts.master')
@section('content')
    <h1>Lista de Categorias</h1>
    <a href="/categorias/create"><button>Crear Nuevo</button></a>
    <div class="container-fluid">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Categoria</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categoria as $category)
                        <tr>
                            <td>{{ $category->nombre_categoria }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('categorias.edit', $category->id) }}">Editar</a>
                                <button class="btn btn-danger" data-toggle="modal"
                                    data-target="#logoutModal">Eliminar</button>
                                @section('options')
                                    <div class="modal-footer">
                                        <button class="btn delete-btn">Eliminar</button>
                                        <form action="{{ route('categorias.destroy', $category) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-primary">Aceptar</button>
                                        </form>
                                    </div>
                                @endsection
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
