<?php

use App\Exports\ItemsExport;
use App\Http\Controllers\CapacidadesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EstadisticasController;
use App\Http\Controllers\EstudiosController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\SessionsController;
use App\Mail\Invitacion;
Use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;

Route::get('/', function () {
    return redirect('sign-in');
})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::post('registro', [RegisterController::class, 'store'])->name('registro.usuario');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');

Route::get('verify', function () {
    return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
    return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
    Route::get('billing', function () {
        return view('pages.billing');
    })->name('billing');
    Route::get('tables', function () {
        return view('pages.tables');
    })->name('tables');
    Route::get('rtl', function () {
        return view('pages.rtl');
    })->name('rtl');
    Route::get('virtual-reality', function () {
        return view('pages.virtual-reality');
    })->name('virtual-reality');
    Route::get('notifications', function () {
        return view('pages.notifications');
    })->name('notifications');
    Route::get('static-sign-in', function () {
        return view('pages.static-sign-in');
    })->name('static-sign-in');
    Route::get('static-sign-up', function () {
        return view('pages.static-sign-up');
    })->name('static-sign-up');

    Route::get('user-management',                 [RegisterController::class,    'indexUser'         ])->name('user-management'           );
    Route::get('rol-management',                  [RolesController::class,       'index'             ])->name('rol-management'            );
    Route::post('editar.rol',                     [RolesController::class,       'edit'              ])->name('editar.rol'                );
    Route::post('registro.rol',                   [RolesController::class,       'store'             ])->name('registro.rol'              );
    Route::get('proveedores-management',          [ProveedoresController::class, 'index'             ])->name('proveedores-management'    );
    Route::get('proveedores-management2',         [ProveedoresController::class, 'index'             ])->name('proveedores-management2'   );
    Route::post('proveedor.inactive',             [ProveedoresController::class, 'destroy'           ])->name('proveedor.inactive'        );
    Route::post('proveedor.active',               [ProveedoresController::class, 'update'            ])->name('proveedor.active'          );
    Route::post('actualizar',                     [RegisterController::class,    'update'            ])->name('actualizar.usuario'        );
    Route::post('registro.proveedores',           [ProveedoresController::class, 'store'             ])->name('registro.proveedores'      );
    Route::get('get.proveedores',                 [ProveedoresController::class, 'show'              ])->name('get.proveedores'           );
    Route::post('registro.estudio',               [EstudiosController::class, 'store'                ])->name('registro.estudio'          );
    Route::get('activos.management',              [EstudiosController::class, 'activosManagement'    ])->name('activos.management'        );
    Route::get('borradores.management',           [EstudiosController::class, 'borradoresManagement' ])->name('borradores.management'     );
    Route::get('finalizados.management',          [EstudiosController::class, 'finalizadosManagement'])->name('finalizados.management'    );
    Route::post('registro.manual-item',           [ItemController::class, 'store'                    ])->name('registro.manual-item'      );
    Route::post('items.import.excel',             [ItemController::class, 'itemsIport'               ])->name('items.import.excel'        );
    Route::post('cotizacion.import.excel',        [ItemController::class, 'CotizacionImport'])->name('cotizacion.import.excel');
    Route::post('estudios.proveedores',           [EstudiosController::class, 'estudioProveedores'   ])->name('estudios.proveedores'      );
    Route::post('get.invite.proveedores',         [ProveedoresController::class, 'getInvite'         ])->name('get.invite.proveedores'    );
    Route::get('estadistica.management',          [EstadisticasController::class, 'index'            ])->name('estadistica.management'    );
    Route::post('estadistica.search',             [EstadisticasController::class, 'search'           ])->name('estadistica.search'        );
    Route::get('estadistica.search2',             [EstadisticasController::class, 'search2'          ])->name('estadistica.search2'       );
    Route::get('estadistica.show.proveedor/{id}', [EstadisticasController::class, 'show'             ])->name('estadistica.show.proveedor');
    Route::get('capacidades-management',          [CapacidadesController::class, 'index'             ])->name('capacidades-management'    );
    Route::post('aeronave.create',                [CapacidadesController::class, 'storeAeronave'     ])->name('aeronave.create'           );
    Route::post('capacidad.create',               [CapacidadesController::class, 'store'             ])->name('capacidad.create'          );
    Route::post('otras-capacidad.create',         [CapacidadesController::class, 'storeOtras'        ])->name('otras-capacidad.create'    );
    Route::post('invite2.proveedores',            [ProveedoresController::class, 'invite2'           ])->name('invite2.proveedores'       );
    Route::get('invitacion.correo',               [ProveedoresController::class, 'send'              ])->name('invitacion.correo');
    Route::post('store.configuracion.proveedor',  [ProveedoresController::class, 'storeConfig'       ])->name('store.configuracion.proveedor');
    Route::get('capacidades-proveedor',           [CapacidadesController::class, 'indexCapProveedor' ])->name('capacidades-proveedor');
    Route::get('estudios-proveedor',              [CapacidadesController::class, 'indexEstudiosProveedor'])->name('estudios-proveedor');
    Route::get('items-proveedor/{id}',            [ItemController::class, 'itemsProveedor'           ])->name('items-proveedor');
    Route::post('send.email',                     [ProveedoresController::class, 'send'])->name('send.email');
    Route::get('/export-excel/{id}', [ItemController::class, 'export'])->name('export-excel');
    Route::get('export-excel-comparativa/{id}', [ItemController::class, 'exportComparativa'])->name('export-excel-comparativa');
    Route::post('get.cotizacion', [ItemController::class, 'getCotizacion'])->name('get.cotizacion');
    Route::post('editar.cotizacion', [ItemController::class, 'updateCotizacion'])->name('editar.cotizacion');
    Route::post('upload.document', [ItemController::class, 'uploadDoc'])->name('upload.document');
    Route::post('list.document', [ItemController::class, 'listDocument'])->name('list.document');
    Route::post('get-um',           [ItemController::class, 'getUm'])->name('get-um');
    Route::post('storeCapacidadesConfig',           [CapacidadesController::class, 'storeCapacidadesConfig'])->name('storeCapacidadesConfig');
});
