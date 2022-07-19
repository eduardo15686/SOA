<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class UserControler extends Controller
{
  public function index()
  {
    $user = User::all();
    return response($user);
  }
  /*{
    $lista_permisos = Auth::user()->Role->permissions()->pluck('id')->toArray();
    if(in_array(1, $lista_permisos)){
      dd('si existe');
    }else{
      dd('no existe');
    }
    if (Auth::user()->Role->key_name == 'superadmin') {
      $usuarios = User::with('Role.permissions')->get();

      foreach ($usuarios as $usuario) {
        foreach ($usuario->Role->permissions as $permission) {
          dd($permission->toArray());
        };
      }
    } else {
      dd('No se puede mostrar la información');
    }
  }*/
  public function login()
  {
    $credentials = [
      'email'    => 'jessica.ortiz.is@unipolidgo.edu.mx',
      'password' => 'prueba123'
    ];
    if (Auth::attempt($credentials)) {
      return redirect()->intended('/');
    }
  }

  public function create(Request $request)
  {
    User::create([
      'name'          => $request->name,
      'last_name'      => $request->last_name,
      'edad'        => $request->edad,
      'username'         => $request->username,
      'telphone'         => $request->telphone,
      'email'         => $request->email,
      'password'       => $request->password,
      'role_id'   => $request->role_id,
  ]);
  }
}
