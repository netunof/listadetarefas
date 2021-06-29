<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Tag;
use App\Models\Tarefa;

class DashboardController extends Controller
{
    public function Dashboard(Request $request)
    {
        $apagados = Tarefa::onlyTrashed()->get();
        $tags = Tag::all();
        $tarefas = Tarefa::all()->sortBy('updated_at')->toArray();
        $users = User::all()->toArray();

        return view('dashboard', [
                                    'apagados' => $apagados,
                                    'users' => $users,
                                    'tags' => $tags,
                                    'tarefas' => $tarefas,
                                ]);
    }
}
