<?php

namespace App\Http\Controllers;

use Str;
use App\Models\Estudios;
use App\Models\Items;
use App\Models\TiposEstudios;
use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\InvitacionMailable;
use App\Mail\resetMailable;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function getTiposEstudios()
    {
        return TiposEstudios::all();
    }

    public function countEstudios()
    {
        $activos = Estudios::where('status', 'activo')->count();
        $borrador = Estudios::where('status', 'borrador')->count();
        $finalizado = Estudios::where('status', 'finalizado')->count();

        return response()->json([
            "activos" => $activos,
            "borrador" => $borrador,
            "finalizado" => $finalizado,
        ]);
    }
    public function getItems(Request $request)
    {
        $items = Items::with('um')->with('condicion')->with('pago')->where('estudio_id', $request->id)->get();
        return dataTables()->of($items)->toJson();
    }
    public function reset(Request $request)
    {

        try {
            if ($request->email == $request->email) {
                $verify = User::where('email', 'like', "%{$request->email}%")->exists();
                if ($verify) {
                    $user = User::where('email', 'like', "%{$request->email}%")->first();

                    $pass = 'secret';
                    User::where('id', $user->id)
                        ->update([
                            'name'      => $user->name,
                            'email'     => $user->email,
                            'rol_id'    => $user->rol_id,
                            'status'    => $user->status,
                            'password'  => '$2y$10$uNmBlXkpTRHphxbXnBn/1u.hhJHzIzGqkQECJmrln4vpp8VUjql3u',
                            'pass_dec'  => $pass
                        ]);
                    session(['user' => $user->id]);
                    $correo = new resetMailable();
                    Mail::to($user->email)->send($correo);

                    return redirect('/dashboard');
                    // if ($user->save()) {
                    //     session(['user' => $user->id]);
                    //     $correo = new resetMailable();
                    //     Mail::to($user->email)->send($correo);
                    // }

                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
