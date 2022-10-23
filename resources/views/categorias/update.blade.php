@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h3 class="text-center text-success">Crear Categoria</h3>
	<form action="{{route('categorias.update',$categoria)}}" class="form" method="POST">
		@csrf
        @method('put')
		<div class="register-top-grid">
			<div>
				<span>Nombre Categoria</span>
				<input type="text" class="form-control" name="name" value="{{$categoria->nombre_categoria}}">
			</div>
		</div>
        <button class="btn save-btn">Actualizar</button>
	</form>
</div>
@endsection
