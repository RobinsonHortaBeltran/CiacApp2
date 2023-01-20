<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;
use SebastianBergmann\Type\TrueType;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles=Roles::all();
        return view('pages.roles-management',['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return $request;
        // $user = User::create($attributes)
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Roles $rol)
    {

        try {
            $verify = Roles::where('name','like', "%{$request->name}%")->exists();
            if($verify){
                return redirect('/rol-management')
                ->with("mensaje",'El rol ya esta creado' )
                ->with("tipo", 'danger');
            }else{
                $rol->name= $request->name;
                $rol->status= $request->status;
                $rol->creator= auth()->id();

                if ($rol->save()) {
                    return redirect('/rol-management')
                    ->with("mensaje",'Rol creado con exito' )
                    ->with("tipo", 'success');
                }else{
                    return redirect('/rol-management')
                    ->with("mensaje",'Error al crear rol, por favor intente de nuevo' )
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
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      try {
        return $rol = Roles::find($request->id);
      } catch (\Throwable $th) {
        throw $th;
      }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Roles $roles)
    {
        $datos= [
            'status'=> $request->status_edit_rol,
            'name'  => $request->name_edit_rol
        ];
         $roles->where('id', $request->id_rol)
         ->update($datos);

        return redirect('/rol-management')
        ->with("mensaje",'Rol actualizado con exito' )
        ->with("tipo", 'success');
    }

    public function getRoles(){
        return Roles::all();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Roles $roles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Roles  $roles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Roles $roles)
    {
        //
    }


    public function showUser(Request $request){
        return User::where('id',$request->id)->get();
    }
}
