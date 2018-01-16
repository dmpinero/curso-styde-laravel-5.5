<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        //$users = DB::table('users')->get(); // Los usuarios no son instancias de User (Eloquent)
        $users = User::all();
        $title = 'Listado de Usuarios';

        // return view('users.index')
        //      ->with('users', User::all())
        //      ->with('title', 'Listado de usuarios');

        return view('users.index', compact('title', 'users'));
    }

    public function show($id)
    {
        $user = User::find($id);

        return view('users.show', compact('user'));
    }

    public function create()
    {
        return 'Crear nuevo usuario';
    }
}
