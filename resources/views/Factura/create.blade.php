@extends('layouts.master')
@section('content')
    <div class="container-fluid">
        <h3 class="text-center text-success">Facturar</h3>
        <form action="{{ route('addProduct') }}" method="post" class="register-top-grid mt-3">
            @csrf
            <h3>Productos</h3>
            @method('post')
            <div class="w-100 d-flex justify-content-center align-items-center">
                <div class="w-50 mr-1">
                    <span>Producto<label>*</label></span>
                    <select class="form-control" id="productFacturation" name="producto">
                        @foreach ($productos as $product)
                            <option value="{{ $product->id }}">{{ $product->nombre_producto }}</option>
                        @endforeach
                    </select>
                    @error('product')
                        <span>*{{ $message }}</span>
                    @enderror
                </div>
                <div class="w-50">
                    <span>Cantidad<label>*</label></span>
                    <input type="number" id="cantFacturation" class="form-control" name="cant" value="{{ old('cant') }}">
                    @error('cant')
                        <span>*{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block mt-2" id="btnAddProduct">
                Añadir Producto
                <i class="fas fa-plus-circle"></i>
            </button>
        </form>
        @if (session('productos'))
            <table class="table table-bordered mt-5" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach (session('productos') as $i => $producto)
                            <tr>
                                <th>{{ $producto[0]->id }}</p>
                                <th>{{ $producto[0]->nombre_producto }}</th>
                                <th>C$ {{ $producto[0]->precio_producto }}</th>
                                <th>{{ $producto['cantidad'] }}</th>
                                <th>C$ {{ (int) $producto['cantidad'] * (int) $producto[0]->precio_producto }}</th>
                                <th>
                                    <form action="{{ route('deleteProductToVent') }}" method="post">
                                        @method("delete")
                                        @csrf
                                        <input type="hidden" name="indice" value="{{ $loop->index }}">
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form>
                                </th>
                            </tr>
                        @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Total</td>
                        @if (session('total'))
                            <td>C$ {{ session('total') }}</td>
                        @endif
                    </tr>
                </tfoot>
            </table>
        @endif
        <form class="form mt-3" action="{{ route('facturation.store') }}" method="POST">
            @csrf
            <div class="register-top-grid">
                <h3>Datos Cliente</h3>
                <div class="my-2">
                    <span>Nombre Cliente<label>*</label></span>
                    <input type="text" class="form-control" name="client" value="{{ old('client') }}">
                    @error('client')
                        <span>*{{ $message }}</span>
                    @enderror
                </div>
                <div class="my-2">
                    <span>Fecha<label>*</label></span>
                    <input type="date" class="form-control" name="date" value="{{ old('date') }}">
                    @error('date')
                        <span>*{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="clearfix"> </div>
            <div class="register-but">
                <button type="submit" class="btn btn-success btn-block mt-2">
                    Finalizar Factura
                    <i class="fas fa-check-circle"></i>
                </button>
                <div class="clearfix"> </div>
            </div>
        </form>

        <form action="{{ route('cancelVent') }}" method="POST">
            @method('delete')
            @csrf
            <button type="submit" class="btn btn-danger btn-block mt-2">
                Cancelar facturacion
                <i class="fas fa-times-circle"></i>
            </button>
        </form>
        <a href="{{route('generateReport')}}">Generar reporte</a>
        <script src="{{ asset('js/factura.js') }}"></script>
    </div>
@endsection
