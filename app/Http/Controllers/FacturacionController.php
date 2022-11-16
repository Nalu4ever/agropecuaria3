<?php

namespace App\Http\Controllers;

use App\Models\producto;
use Illuminate\Http\Request;

class FacturacionController extends Controller
{
    public function getTotal()
    {
        $total = 0;
        foreach ($this->getProducts() as $producto) {
            $total += $producto["cantidad"] * $producto[0]->precio_producto;
        }

        return $total;
    }

    function getProducts()
    {
        $productos = session("productos");

        if (!$productos) {
            $productos = [];
        }

        return $productos;
    }

    public function addProductToVent(Request $request)
    {
        $request->validate([
            'cant' => 'required',
            'producto' => 'required'
        ]);

        $cantidad = $request->cant;
        $codigo = $request->producto;
        $producto = [producto::where("id", "=", $codigo)->first(), 'cantidad' => $cantidad];

        if (!$producto) {
            return redirect()
                ->route("Factura.create")
                ->with("mensaje", "Producto no encontrado");
        }

        $productos = $this->getProducts();

        $posibleIndice = $this->buscarIndiceDeProducto($producto[0]->id, $productos);

        if ($posibleIndice === -1) {
            array_push($productos, $producto);
        } else {
            $productos[$posibleIndice]["cantidad"] = $productos[$posibleIndice]["cantidad"] + $producto["cantidad"];
        }

        session(["productos" => $productos,]);

        $this->updateTotal();

        return redirect("facturation/create");
    }

    private function updateTotal()
    {
        $total = $this->getTotal();
        session(["total" => $total,]);
    }

    private function buscarIndiceDeProducto($codigo, $productos)
    {
        foreach ($productos as $i => $producto) {
            if ($producto[0]->id === $codigo) {
                return $i;
            }
        }
        return -1;
    }

    public function deleteProductToVent(Request $request)
    {
        $indice = $request->indice;
        $productos = $this->getProducts();
        array_splice($productos, $indice, 1);
        session(["productos" => $productos,]);
        $this->updateTotal();

        return redirect("facturation/create");
    }

    public function cancelVent()
    {
        session(["total" => null,]);
        session(["productos" => null,]);
        return redirect("facturation/create");
    }

    public function view()
    {
        return view('facturas.reports');
    }



}






