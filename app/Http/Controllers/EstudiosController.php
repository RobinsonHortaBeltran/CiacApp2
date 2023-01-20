<?php

namespace App\Http\Controllers;

use App\Models\Documentos;
use App\Models\Estudios;
use App\Models\InviteProveedores;
use App\Models\Proveedores;
use Illuminate\Http\Request;

class EstudiosController extends Controller
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

    public function estudioProveedores(Request $request){
       try {

        foreach ($request->proveedores as $value) {
            $inviteProveedor = new InviteProveedores();
            $inviteProveedor->email = $value;
            $inviteProveedor->creator = auth()->id();
            $inviteProveedor->estudio = $request->id_estudio;
            $inviteProveedor->save();
        }

        return back()
        ->with("mensaje", "Listado de proveedores asignado con exito al estudio #'" . $request->id_estudio . "")
                        ->with("tipo", 'success');
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
    public function store(Request $request, Estudios $estudios, Documentos $documentos)
    {

        $trm = explode(",", $request->trm);
        $trm2 = explode(".", $trm[1]);
        $trm_f = $trm[0] . $trm2[0];

        $name_document = "solicitud-" . random_int(100000, 999999);
        // return $request->file('cargar_documento')->store('public');

        try {
            $estudios->servicio = $request->servicio;
            $estudios->fecha = $request->fecha;
            $estudios->tipo_id = $request->tipo_estudio;
            $estudios->creator = auth()->id();
            $estudios->trm = $trm_f;
            $estudios->descripcion = $request->description;
            $estudios->status = $request->estatus;
            if ($estudios->save()) {
                $documentos->name = $name_document;
                $documentos->route = $request->file('cargar_documento')->store('public');
                $documentos->creator = auth()->id();
                $documentos->estudio_id = $estudios->id;

                if ($documentos->save()) {
                    return redirect('/dashboard')
                        ->with("mensaje", 'Estudio de mercado creado con exito')
                        ->with("tipo", 'success');
                } else {
                    return redirect('/rol-management')
                        ->with("mensaje", 'Error al crear estudio de mercado, por favor intente de nuevo')
                        ->with("tipo", 'danger');
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudios  $estudios
     * @return \Illuminate\Http\Response
     */
    public function show(Estudios $estudios)
    {
        //
    }
    public function activosManagement()
    {    $proveedores= Proveedores::where('status', '1')->get();
        $estudios = Estudios::where('status', 'activo')->get();
        return view('pages.estudios-activos-management', ["estudios" => $estudios,"proveedores" =>$proveedores]);
    }
    public function borradoresManagement()
    { $proveedores= Proveedores::where('status','1')->get();
        $estudios = Estudios::where('status', 'borrador')->get();
        return view('pages.estudios-borradores-management',["estudios" => $estudios,"proveedores" =>$proveedores]);
    }

    public function finalizadosManagement()
    {$proveedores= Proveedores::where('status', '1')->get();
        $estudios = Estudios::where('status', 'finalizado')->get();
        return view('pages.estudios-finalizados-management',["estudios" => $estudios,"proveedores" =>$proveedores]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estudios  $estudios
     * @return \Illuminate\Http\Response
     */
    public function edit(Estudios $estudios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estudios  $estudios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Estudios $estudios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudios  $estudios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Estudios $estudios)
    {
        //
    }
}
