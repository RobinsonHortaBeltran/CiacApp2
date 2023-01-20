<?php

namespace App\Http\Controllers;

use App\Exports\ComparativaExport;
use App\Exports\ItemsExport;
use App\Imports\ItemsImport;
use App\Imports\CotizacionImport;
use App\Models\Adjuntos;
use App\Models\cotizacion;
use App\Models\FormaPago;
use App\Models\Items;
use App\Models\UnidadMedida;
use App\Models\Condiciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class ItemController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Items $item)
    {

       try {
        $item->material = $request->material;
        $item->cantidad = $request->cantidad;
        $item->u_medida = $request->u_medida;
        $item->forma_pago = $request->forma_pago;
        $item->desc_material= $request->desc_material;
        $item->parte_numero= $request->parte_numero;
        $item->parte_numero_alterno= $request->parte_numero_alterno;
        $item->condicion_requerida= $request->condicion_requerida;


        $item->estudio_id = $request->id_estudio;
        $item->creator = auth()->id();
        $item->servicio = $request->description;
        if ($item->save()) {
            return back()->with("mensaje", 'Registro creado con exito')
                        ->with("tipo", 'success');
        }else{
            return back()->with("mensaje", 'Error al crear registro ')
            ->with("tipo", 'danger  ');
        }
       } catch (\Throwable $th) {
        throw $th;
       }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show(Items $items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $items)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(Items $items)
    {
        //
    }
    public function itemsIport(Request $request){
        $file= $request->file('cargar_documento');
        Excel::import(new ItemsImport, $file);
        return back();
    }

    public function itemsProveedor($id)
    {
        $items = Items::with('um')->with('condicion')->with('pago')->with('item_cotizacion')->where('estudio_id',$id)->get();
        return view('pages.proveedores.items-proveedor-management',
        [
            "items"=>$items
        ]);
    }

    public function export($id)
    {
        $items = Items::with('um')->with('condicion')->with('pago')->where('estudio_id', $id)->get();
        return Excel::download(new ItemsExport($items), 'Items-estudio' . $id . '.xlsx');
    }
    public function exportComparativa($id)
    {

            $cotizaciones = cotizacion::with('cotizacion_proveedor')->where('estudio_id', $id)->get();
         return Excel::download(new ComparativaExport($cotizaciones), 'Comparativa' . $id . '.xlsx');
    }
    public function CotizacionImport(Request $request)
    {

        $file = $request->file('cargar_documento_cotizacion');
        Excel::import(new CotizacionImport($request->estudio_id), $file);
        return back();
    }

    public function getCotizacion(Request $request)
    {
        try {
            $cotizacion = cotizacion::where('id_item',$request->id)->first();
            return response()->json($cotizacion);
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function updateCotizacion(Request $request)
    {

        try {
             $cotizacion = cotizacion::find($request->id_cotizacion);
             $cotizacion->cantidad_ofertada= $request->cantidad_ofertada_edt;
             $cotizacion->vlr_unidad_sin_iva= $request->vlr_unitario_sin_iva;
             $cotizacion->condicion_ofertada= $request->condicion_ofertada_edt;
             $cotizacion->entrega_en_dias= $request->tiempo_entrega_dias;
             $cotizacion->um_ofertada= $request->um_ofertada;
             $cotizacion->incoterms= $request->incoterms;
             $cotizacion->validez_en_dias= $request->validez_oferta;
             $cotizacion->garantia= $request->garantia;
             $cotizacion->moneda= $request->moneda;
             $cotizacion->observaciones= $request->obs;
            if ($cotizacion->save()) {
                return back()->with("mensaje", 'Registro actualizado con exito')
                ->with("tipo", 'success');
            } else {
                return back()->with("mensaje", 'Error al actualizar registro ')
                ->with("tipo", 'danger');
            }


        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function uploadDoc(Request $request)
    {
        // return $request;
        try {
            $proveedor = Auth()->user()->id;
            $nombre    = $request->file('cargar_documento')->getClientOriginalName();
            $route     = $request->file('cargar_documento')->store('public');
            $estudio   = $request->estudio_id_ad;
            $adjuntos = new Adjuntos();
            $adjuntos->name= $nombre;
            $adjuntos->route= $route;
            $adjuntos->proveedor= $proveedor;
            $adjuntos->estudio= $estudio;
            if($adjuntos->save())
            {
                return back()->with("mensaje", 'Documento cargado con exito')
                ->with("tipo", 'success');
            }else {
                return back()->with("mensaje", 'Error al cargar el documento')
                ->with("tipo", 'danger');
            }

        } catch (\Throwable $th) {
            throw $th;
        }

    }

    public function listDocument(Request $request)
    {
         $adjuntos= Adjuntos::where('estudio',$request->estudio_id_list)->where('proveedor',Auth()->user()->id)->get();
        return view('documents.list-document-management',[
            "adjuntos"=>$adjuntos
        ]);
    }

    public function getUm(Request $request)
    {
        return response()->json([
            "unidad_medida"=> UnidadMedida::all(),
            "forma_pago"=> FormaPago::all(),
            "condicion"=> Condiciones::all()
        ]);
    }
}
