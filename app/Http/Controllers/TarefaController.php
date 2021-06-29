<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'tags' => 'required',
        ]);
        Tarefa::create($request->all());
        $tarefa = Tarefa::orderBy('created_at', 'desc')->first();

        $tarefa->tag()->attach($request->tag);
        $tarefa->user()->attach($request->user);

        return redirect('dashboard');
    }

    public function show($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tags = $tarefa->tag()->orderBy('nome')->get();
        $users = $tarefa->user()->orderBy('name')->get();
        return compact('tarefa', 'tags', 'users');
    }

    public function edit(Tarefa $tarefa)
    {
        $tags = $tarefa->tag()->get();
        return compact('tarefa', 'tags');
    }

    public function update(Request $request, Tarefa $tarefa)
    {
        $dados = $request->input();

        $tarefa->nome = $dados['nome'];
        $tarefa->descricao = $dados['descricao'];
        $tarefa->update();

        return redirect('/');
    }

    public function destroy($id)
    {
        $tarefa = Tarefa::find($id);
        $tarefa->delete();
    }
}
