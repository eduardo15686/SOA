<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\InventariosController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\UserControler;


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
})->name('home');

Route::get('login', [UserControler::class, 'login']);

Route::post('create-role', [RoleController::class, 'CreateRole']);

//Inventario
Route::get('inventario', [InventariosController::class, 'index']);
Route::get('inventario/{key_name}', [InventariosController::class, 'findpermission']);
Route::post('create-inventario', [InventariosController::class, 'CreateInventario']);
Route::get('update-inventario/{id}', [InventariosController::class, 'UpdateInventario']);
Route::get('update-inventario-k/{key_name}', [InventariosController::class, 'UpdateInventarioKeyName']);
Route::delete('delete-inventario/{key_name}', [InventariosController::class, 'DeleteInventario']);

//Usuarios
Route::get('usuarios', [UserControler::class, 'index']);
Route::post('crear-usuario', [UserControler::class, 'create']);


Route::group(['middleware' => ['auth']], function () {
    Route::get('roles', [RoleController::class, 'index']);
    Route::get('role/{key_name}', [RoleController::class, 'findRole']);

    Route::get('update-role/{id}', [RoleController::class, 'UpdateRole']);
    Route::get('update-role-k/{key_name}', [RoleController::class, 'UpdateRolebyKeyName']);
    Route::get('delete-role/{key_name}', [RoleController::class, 'DeleteRole']);

    Route::get('permission', [PermissionController::class, 'index']);
    Route::get('permission/{key_name}', [PermissionController::class, 'findpermission']);
    Route::get('create-permission', [PermissionController::class, 'CreatePermission']);
    Route::get('update-permission/{id}', [PermissionController::class, 'UpdatePermission']);
    Route::get('update-permission-k/{key_name}', [PermissionController::class, 'UpdatePermissionyKeyName']);
    Route::get('delete-permission/{key_name}', [PermissionController::class, 'DeletePermission']);




    Route::get('groups', [GroupController::class, 'index']);
    Route::get('groups/{key_name}', [GroupController::class, 'findGroup']);

    Route::get('rol-pivote', [RoleController::class, 'indexPivot']);
});
