<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function indexUser()
    {
        $user = User::with('user_rol')->orderBy('id', 'ASC')->get();
        return view('pages.laravel-examples.user-management', ['users' => $user]);
    }
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {

        try {
            $verify = User::where('email', 'like', "%{$request->email}%")->exists();

            if ($verify) {
                return redirect('/user-management')
                    ->with("mensaje", 'El email ya esta asociado')
                    ->with("tipo", 'danger');
            } else {
                $attributes = request()->validate([
                    'name'     => 'required|max:255',
                    'email'    => 'required|email|max:255|unique:users,email',
                    'password' => 'required|min:5|max:255',
                    'rol_id'   => 'required',
                ]);
                if ($user = User::create($attributes)) {
                    auth()->login($user);
                    return redirect('/user-management')
                        ->with("mensaje", 'Usuario Creado con exito')
                        ->with("tipo", 'success');
                } else {

                    return redirect('/user-management')
                        ->with("mensaje", 'Error al crear usuario')
                        ->with("tipo", 'danger');
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    public function update(Request $request)
    {

        if ($request->password == NULL) {
            User::where('id', $request->id_edt)
                ->update([
                    'name'      => $request->name_edit_user,
                    'email'     => $request->email_edit_user,
                    'rol_id'    => $request->rol_id_edt,
                    'status'    => $request->status_user_edt
                ]);
        } else {
            User::where('id', $request->id_edt)
                ->update([
                    'name'      => $request->name_edit_user,
                    'email'     => $request->email_edit_user,
                    'rol_id'    => $request->rol_id_edt,
                    'status'    => $request->status_user_edt,
                    'password'  => bcrypt($request->password)
                ]);
        }

        return redirect('/user-management')
            ->with("mensaje", 'Usuario Actualizado con exito')
            ->with("tipo", 'success');
    }


}
