<?php

namespace App\Http\Controllers;
use App\Models\Group;

use Illuminate\Http\Request;

class groupController extends Controller
{
    public function index(){
        $groups = Group::all()->toArray();
        dd($groups);
 
     }
     public function findGroup($key_name){
         $groups = Group::where('key_name', $key_name)->first()->toJson();
         dd($groups);
  
      }
}
