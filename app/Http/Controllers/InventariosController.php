<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventario;
use Illuminate\Support\Str;

class InventariosController extends Controller
{
    public function index()
    {
        $inventario = Inventario::all();
        return response($inventario);
    }

    public function findPermission($key_name)
    {
        $permission = Inventario::where('key_name', $key_name)->first()->toJson();
        dd($permission);
    }
    public function CreateInventario(Request $request)
    {
        Inventario::create([
            'name'          => $request->name,
            'key_name'      => Str::slug($request->name),
            'cantidad'      => $request->cantidad,
            'precio'        => $request->precio,
            'talla'         => $request->talla,
            'marca'         => $request->marca,
            'color'         => $request->color,
            'seccion'       => $request->seccion,
            'tipo_prenda'   => $request->tipo_prenda,
        ]);
    }
    public function UpdateInventario($id)
    {
        $permission = Inventario::find($id);
        $permission->update([
            'name' => 'Move. Permission',
            'key_name' => 'move_permission'
        ]);
    }
    public function UpdateInventarioKeyName($key_name)
    {
        $permission = Inventario::where('key_name', $key_name)->first();
        $permission->update([
            'name' => 'Move. Permission',
            'key_name' => 'move_permission'
        ]);
    }
    public function DeleteInventario($key_name)
    {
        $permission = Inventario::where('key_name', $key_name)->first();
        $permission->Delete();
    }
}
