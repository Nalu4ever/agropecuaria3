@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <h3 class="text-center text-success">Crear Categoria</h3>
	<form action="{{route('categorias.store')}}" class="form" method="POST">
		@csrf
		<div class="register-top-grid">
			<div>
				<span>Nombre Categoria</span>
				<input type="text" class="form-control" name="name" value="{{old('name')}}">
			</div>
		</div>
        <button class="btn save-btn">Guardar</button>
	</form>
</div>
@endsection
