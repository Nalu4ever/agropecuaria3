<?php

namespace App\Http\Controllers;
use App\Http\Requests\FacturaRequest;
use App\Models\Factura;
use App\Models\producto;
use App\Models\Cliente;
use App\Models\FacturaDetalle;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use PDF;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos=producto::all();
        return view('Factura.create',compact('productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacturaRequest $request)
    {
        try {
            $request->validated();
            $client = new Cliente();
            $client->nombre_cliente = $request->client;
            $client->save();

            $factura = new Factura();
            $factura->fk_clientes = $client->id;
            $factura->fecha_factura = $request->date;
            $factura->total_factura = session('total');
            $factura->save();


            foreach (session('productos') as $producto) {
                $detalleFactura = new FacturaDetalle();
                $detalleFactura->fk_facturas = $factura->id;
                $detalleFactura->fk_articulos
                 = $producto[0]->id;
                $detalleFactura->cantidad = $producto["cantidad"];
                $detalleFactura->save();
            }

            $pdf = App::make('dompdf.wrapper');
            $pdf->loadView('Factura.reports', ['factura' => $factura, 'productos' => session('productos'), 'cliente' => $client, 'total' => session('total')]);
            session(['data' => array('productos' => session('productos'), 'cliente' => $client, 'total' => session('total'), 'factura' => $factura)]);

            session(["total" => null,]);
            session(["productos" => null,]);

            return redirect()->route('facturation.create')
                ->withSuccess("Facturación Exitosa");
        } catch (Exception $e) {
            return redirect()->route('facturation.create')
                ->withErrors("!Ha ocurrido un error al finalizar la factura¡ ");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Factura $factura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Factura $factura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy(Factura $factura)
    {
        //
    }

    public function generateReport()
    {
        $data = session('data');
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadView('Factura.reports', ['productos' => $data["productos"], 'cliente' => $data["cliente"], 'total' => $data["total"], 'factura' => $data["factura"]]);
        return $pdf->stream();
    }
}
