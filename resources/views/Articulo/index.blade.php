<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Productos</title>
</head>

<body>
  <h1>Lista de Productos</h1>
  <div class="col-md-10 mx-auto bg-white p-3">
      <a href="/articulo/create">
        <button class="btn btn-new">Nuevo</button>
      </a>
    <table class="table">
      <thead class="bg-primary text-light">
        <tr>
          <th>Id</th>
          <th>Cantidad</th>
          <th>Articulo</th>
          <th>Precio</th>
        </tr>
      </thead>
      @foreach ($data as $a )
      <tr>
        <td>{{$a->$articulo_nombre}}</td>
        <td></td>
        <td></td>
      </tr>

      @endforeach

    </table>
  </div>
</body>

</html>
