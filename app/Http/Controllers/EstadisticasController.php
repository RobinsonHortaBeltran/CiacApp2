<?php

namespace App\Http\Controllers;

use App\Models\Estudios;
use App\Models\InviteProveedores;
use App\Models\Proveedores;
use App\Models\User;
use Illuminate\Http\Request;

class EstadisticasController extends Controller
{
    public function index()
    {
        $activos = Estudios::where('status', 'activo')->count();
        $borrador = Estudios::where('status', 'borrador')->count();
        $finalizado = Estudios::where('status', 'finalizado')->count();
        $total_proveedores = Proveedores::count();

        $total_estudios= $activos + $borrador + $finalizado;
        return view('pages.estadisticas.estadisticas-management', [
            "activos" => $activos,
            "borrador" => $borrador,
            "finalizados" => $finalizado,
            "total"=> $total_estudios,
            "total_proveedores"=> $total_proveedores
        ]);
    }

    public function search(Request $request){

        try {
            switch ($request->tipo) {
                case '1':
                     $user = User::where('rol_id','!=',1)->get();
                    $data = [];
                    foreach ($user as  $value) {
                        $estudio = Estudios::where("creator", $value->id)->count();

                        $temp = [];
                        $temp['id'] = $value->id;
                        $temp['name'] = $value->name;
                        $temp['email'] = $value->email;
                        $temp['estudio'] = $estudio;

                        array_push($data, $temp);
                    }
                    return dataTables()->of($data)->toJson();
                    break;
                case '2':
                     $data_proveedor = Proveedores::all();
                    $data = [];
                    foreach ($data_proveedor as  $value) {
                        $invitado = InviteProveedores::where("email", $value->email)->count();

                        $temp = [];
                        $temp['id'] = $value->id;
                        $temp['name'] = $value->name;
                        $temp['email'] = $value->email;
                        $temp['invitado'] = $invitado;
                        $temp['participadas'] = '0';
                        $temp['ranking'] = '0 %';

                        array_push($data, $temp);
                    }

                      return dataTables()->of($data)->toJson();
                    break;
                case '3':
                    return "Por estudio";
                    break;
                default:
                    # code...
                    break;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function search2(){

        $data_proveedor = Proveedores::all();
        $data=[];
        foreach ($data_proveedor as  $value) {
            $invitado = InviteProveedores::where("email",$value->email)->count();

            $temp=[];
            $temp['id']= $value->id;
            $temp['name'] = $value->name;
            $temp['email'] = $value->email;
            $temp['invitado'] = $invitado;
            // return $value->id;
            array_push($data,$temp);
        }
        // return $data;
         return dataTables()->of($data)->toJson();
    }

    public function show($id){
        $proveedor = Proveedores::where('id',$id)->first();
         $invite =  InviteProveedores::where('email', $proveedor->email)->get();
         $invite = InviteProveedores::with('invite_creator')->where('email', $proveedor->email)->orderBy('id', 'ASC')->get();

        // $estudios=[];
        // foreach ($invite as $value) {
        // $temp=[];
        // $sql_estudios = Estudios::where('id',$value->estudio)->first();
        // $temp['']=>
        // }
        return view('pages.estadisticas.estadistica-show-proveedor',
        [
            "proveedores"=> $proveedor,
            "estudios"   => $invite
        ]);
    }
}
