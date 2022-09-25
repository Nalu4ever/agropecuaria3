<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Crear Producto</title>
</head>
<body>
  <div class="container">
    <h1>Crear Producto Nuevo</h1>
    <form class="arti-form" method="POST" action="/articulo">
      @csrf
      <label for="name" class="label label-name">Articulo: </label>
      <input type="text" name="articulo_nombre" id="name" class="input input-nombre">

      <label for="cant" class="label label-cant">Cantidad: </label>
      <input type="number" name="cantidad" id="cant" class="input input-cantidad">

      <label for="price" class="label label-price">Precio: </label>
      <input type="number" name="precio" id="price" class="input input-precio">

      <button class="btn save-btn">Guardar</button>
    </form>
  </div>
</body>
</html>
