<?php

namespace App\Http\Controllers;

use App\Models\Aeronaves;
use App\Models\CapacidadesModel;
use App\Models\CapacidadesProveedorConfiguracion;
use App\Models\Estudios;
use App\Models\InviteProveedor2;
use App\Models\OtrasCapacidades;
use App\Models\Proveedores;
use App\Models\TipoCapacidades;
use App\Models\TipoSubCapacidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CapacidadesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { //cambio
        $aeronaves = Aeronaves::all();
        $proveedores = Proveedores::with('proveedor_configuracion')->with('proveedor_otras_capacidades')->with('proveedor_capacidades')->with('proveedor_aeronave')->where('status', '1')->get();
        $estudios = Estudios::where('status', 'borrador')->get();
        $capacidades = CapacidadesModel::all();
        $otrasCapacidades = OtrasCapacidades::all();
        return view(
            'pages.capacidades.capacidades-management',
            [
                'aeronaves' => $aeronaves,
                'proveedores' => $proveedores,
                'capacidades' => $capacidades,
                'otras' => $otrasCapacidades,
                'estudios' => $estudios
            ]
        );
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

    public function storeAeronave(Request $request, Aeronaves $aeronaves)
    {
        try {

            $aeronaves->name = $request->name_aeronave;
            $aeronaves->proveedor = $request->proveedores;

            if ($aeronaves->save()) {
                return redirect('/capacidades-management')
                    ->with("mensaje", 'Aeronave creada con exito!')
                    ->with("tipo", 'success');
            } else {
                return redirect('/capacidades-management')
                    ->with("mensaje", 'Error al crear aeronave!')
                    ->with("tipo", 'danger');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request;
        try {
            $capacidades = new CapacidadesModel();
            $capacidades->name = $request->name_capacidad;
            $capacidades->proveedor = $request->proveedores_capacidades;

            if ($capacidades->save()) {
                return redirect('/capacidades-management')
                    ->with("mensaje", 'Capacidad creada con exito!')
                    ->with("tipo", 'success');
            } else {
                return redirect('/capacidades-management')
                    ->with("mensaje", 'Error al crear capacidad!')
                    ->with("tipo", 'danger');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function storeOtras(Request $request)
    {

        try {
            $capacidades = new OtrasCapacidades();
            $capacidades->name = $request->name_capacidad;
            $capacidades->proveedor = $request->proveedores_otra;

            if ($capacidades->save()) {
                return redirect('/capacidades-management')
                    ->with("mensaje", 'Capacidad creada con exito!')
                    ->with("tipo", 'success');
            } else {
                return redirect('/capacidades-management')
                    ->with("mensaje", 'Error al crear capacidad!')
                    ->with("tipo", 'danger');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CapacidadesModel  $capacidadesModel
     * @return \Illuminate\Http\Response
     */
    public function show(CapacidadesModel $capacidadesModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CapacidadesModel  $capacidadesModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CapacidadesModel $capacidadesModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CapacidadesModel  $capacidadesModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CapacidadesModel $capacidadesModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CapacidadesModel  $capacidadesModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CapacidadesModel $capacidadesModel)
    {
        //
    }
    public function indexCapProveedor()
    {
        // $tipo= TipoCapacidades::with('tipo_subTipo')->where('status','1')->get();
        $militar = TipoSubCapacidades::with('subTipo_item')->where('tipo_principal', '1')->get();
        $civil   = TipoSubCapacidades::with('subTipo_item')->where('tipo_principal', '2')->get();
         $info= [
            "militar"=> $militar,
            "civil" => $civil
        ];
        return view('pages.proveedores.capacidades-proveedor-management', ["militar" => $militar, "civil" => $civil]);
    }

    public function indexEstudiosProveedor()
    {
        // return Auth()->user()->id;
        $proveedor = Proveedores::where('id_user', Auth()->user()->id)->first();
        $estudios= InviteProveedor2::with('proveedor_estudio')->where('id_proveedor', $proveedor->id)->get();
        return view('pages.proveedores.estudios-proveedor-management',["estudios"=> $estudios]);
    }

    public function storeCapacidadesConfig(Request $request,CapacidadesProveedorConfiguracion $capacidadConfig)
    {
        // return $request;
        try {
            if ($request->sub_tipo== 1) {
                $array = $request->ala_fija_m;
            }elseif ($request->sub_tipo == 2) {
               $array =$request->ala_rotativa_m;
            }elseif ($request->sub_tipo == 3) {
                $array = $request->ala_fija_c;
            }
            $capacidadConfig->proveedor = Auth()->user()->id;
            $capacidadConfig->array     = $array;
            $capacidadConfig->tipo      = $request->tipo;
            $capacidadConfig->subtipo   = $request->sub_tipo;
            // $capacidadConfig->save();

            if ($capacidadConfig->save()) {
                return back()->with("mensaje", 'Capacidades asignadas con exito')
                ->with("tipo", 'success');
            } else {
                return back()->with("mensaje", 'Error al asignar las capacidades')
                ->with("tipo", 'danger');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
