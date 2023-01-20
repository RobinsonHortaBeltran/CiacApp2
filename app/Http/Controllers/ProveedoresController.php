<?php

namespace App\Http\Controllers;

use App\Models\InviteProveedor2;
use App\Models\InviteProveedores;
use App\Models\Proveedores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\InvitacionMailable;
use App\Models\ConfigProveedor;
use App\Models\Estudios;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ProveedoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores = Proveedores::all();
        return view(
            'pages.proveedores-management',
            [
                'proveedores' => $proveedores
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Proveedores $proveedores, User $user)
    {

        try {
            if ($request->email == $request->email_confirm) {
                $verify = Proveedores::where('email', 'like', "%{$request->email}%")->exists();
                if ($verify) {
                    return redirect('/proveedores-management')
                        ->with("mensaje", 'El email y/o el nombre ya estan registrados')
                        ->with("tipo", 'danger');
                } else {

                    $pass = "secret";
                    $password = bcrypt($pass);
                    $user->name  = $request->name;
                    $user->email = $request->email;
                    $user->password = $password;
                    $user->rol_id = 3;
                    if ($user->save()) {
                    $proveedores->name = $request->name;
                    $proveedores->code = $request->code;
                    $proveedores->email = $request->email;
                    $proveedores->id_user = $user->id;
                    $proveedores->creator = auth()->id();
                    if ($proveedores->save()) {
                            return redirect('/proveedores-management')
                                ->with("mensaje", 'Proveedor Creado con exito')
                                ->with("tipo", 'success');
                        }
                    } else {
                        return redirect('/proveedores-management')
                            ->with("mensaje", 'Error al crear el proveedor')
                            ->with("tipo", 'danger');
                    }
                }
            } else {
                return redirect('/proveedores-management')
                    ->with("mensaje", 'Los email no coinciden')
                    ->with("tipo", 'danger');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function show(Proveedores $proveedores)
    {
        try {
            $proveedores = Proveedores::where('status', '1')->get();
            return response()->json($proveedores);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function edit(Proveedores $proveedores)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proveedores $proveedores)
    {
        try {
            $proveedores = Proveedores::find($request->id_proveedor);
            $proveedores->status = '1';
            if ($proveedores->save()) {
                return redirect('/proveedores-management')
                    ->with("mensaje", 'Proveedor desbloqueado con exito')
                    ->with("tipo", 'success');
            } else {
                return redirect('/proveedores-management')
                    ->with("mensaje", 'Error al desbloquear proveedor')
                    ->with("tipo", 'danger');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proveedores  $proveedores
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Proveedores $proveedores)
    {

        try {

            $proveedores = Proveedores::find($request->id_proveedor);
            $proveedores->status = '0';
            if ($proveedores->save()) {
                return redirect('/proveedores-management')
                    ->with("mensaje", 'Proveedor bloqueado con exito')
                    ->with("tipo", 'success');
            } else {
                return redirect('/proveedores-management')
                    ->with("mensaje", 'Error al bloquear proveedor')
                    ->with("tipo", 'danger');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function getInvite(Request $request)
    {
        try {
            return $invite = InviteProveedores::where('estudio', $request->id)->get();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function invite2(Request $request, InviteProveedor2 $invite)
    {
        // return $request;
        try {
            $proveedores = $request->proveedores;
            $array = explode(',', $proveedores);
            foreach ($array as $value) {

                $proveedor = Proveedores::where('id', $value)->first();

                $correo = new InvitacionMailable();
                //Mail::to($proveedor->email)->send($correo);

                $invite = new InviteProveedor2();


                $invite->estudio = $request->estudio;
                $invite->creator = Auth()->id();
                $invite->id_proveedor = $value;
                $invite->save();

                $invite2 = new InviteProveedores();
                $invite2->estudio = $request->estudio;
                $invite2->creator = Auth()->id();
                $invite2->email = $proveedor->email;
                $invite2->save();
            }

            $estudio = Estudios::where('id', $request->estudio)->first();
            $estudio->status = 'borrador';
            if ($estudio->save()) {
                return redirect('/borradores.management')
                    ->with("mensaje", 'Proveedores invitados con exito, el estudio se actualizo a activo')
                    ->with("tipo", 'success');
            } else {
                return redirect('/borradores.management')
                    ->with("mensaje", 'Error al actualizar estudio ')
                    ->with("tipo", 'danger');
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function send(Request $request)
    {

         $proveedores = InviteProveedores::where('estudio',$request->estudio_id)->get();

        foreach ($proveedores as  $proveedor) {
            $proveedores2 = InviteProveedor2::where('estudio', $request->estudio_id)->get();
           foreach ($proveedores2 as $value) {

             $proveedor_data= Proveedores::where('id',$value->id_proveedor)->first();
                  session(['idProveedor'=> $proveedor_data->id_user]);
           }

        $correo = new InvitacionMailable();
        Mail::to($proveedor->email)->send($correo);
             Session::forget('idProveedor');
        }
         $estudio = Estudios::where('id', $request->estudio_id)->first();
        $estudio->status = 'activo';
        if ($estudio->save()) {
            return redirect('/activos.management')
            ->with("mensaje", 'Proveedores invitados con exito, el estudio se actualizo a activo')
            ->with("tipo", 'success');
        } else {
            return redirect('/activos.management')
            ->with("mensaje", 'Error al actualizar estudio ')
            ->with("tipo", 'danger');
        }
    }

    public function storeConfig(Request $request, ConfigProveedor $configProveedor)
    {

        try {
            $proveedores = $request->proveedores;
            $array = explode(',', $proveedores);

            foreach ($array as $value) {
                $configProveedor = new ConfigProveedor();

                $configProveedor->proveedor = $value;
                //$configProveedor->creator = Auth()->id();
                $configProveedor->aeronave = $request->aeronave;
                $configProveedor->nombre_aeronave = $request->texto_aeronave;

                $configProveedor->capacidad = $request->capacidad;
                $configProveedor->nombre_capacidad = $request->texto_capacidades;

                $configProveedor->otra_capacidad = $request->otras;
                $configProveedor->nombre_otra_capacidad = $request->texto_otas_capacidades;

                $configProveedor->save();
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
