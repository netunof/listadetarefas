<?php

namespace App\Http\Controllers;

use App\Models\Tarefa;
use Illuminate\Http\Request;

class LixeiraController extends Controller
{
    public function eliminar($id)
    {
        $tarefa = Tarefa::find($id)->withTrashed();

        $tarefa->forceDelete();
    }
    public function restaurar($id)
    {
        $tarefa = Tarefa::find($id)->withTrashed();

        $tarefa->restore();
    }
}
