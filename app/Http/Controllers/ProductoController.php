<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductoRequest;
use App\Models\Categoria;
use Exception;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product= producto::paginate(15);
        $categorias=Categoria::all();
        return view('productos.index',compact('product','categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categoria::all();
        return view('productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductoRequest $request)
    {
        try {
            $request->validated();
            $product = new producto();
            $product ->nombre_producto = $request ->producto;
            $product ->precio_producto = $request ->precio;
            $product ->cantidad_producto = $request->cantidad;
            $product->fk_categories = $request -> categoria;
            $product->save();
            return redirect()->route('productos.index')
            ->withadd('Se creo el producto correctamente');
        } catch (Exception $e) {
            return redirect()->route('productos.index')
            ->witherrors('Ha ocurrido un error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show(producto $producto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = producto::find($id);
        $categorias=Categoria::all();
        $categoria=Categoria::find($product->fk_categories);
        return view('productos.update',compact('product','categorias','categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(ProductoRequest $request, producto $producto)
    {
        try {
            
            $request->validated();
            $product->nombre_producto = $request ->producto;
            $product->precio_producto = $request ->precio;
            $product->cantidad_producto = $request->cantidad;
            $product->fk_categories = $request -> categoria;
            $product->save();
            return redirect()->route('productos.index')
            ->withadd('Se edito correctamente el producto');
        } catch (Exception $e) {
            return redirect()->back()
            ->witherrors('Ocurrio un error al editar el producto');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(producto $producto)
    {
        //
    }
}
