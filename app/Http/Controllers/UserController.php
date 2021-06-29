<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function painel(){
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        $users =  User::all();
        return view('users', compact('users'));
    }
    public function apagar(Request $request ){
        if (! Gate::allows('isAdmin')) {
            abort(403);
        }
        $id = $request->id;
        $user = User::find($id);
        $user->delete();
    }
}
