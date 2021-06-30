<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Tarefa;

class TarefaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required',
            'status' => 'required',
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

    public function edit($id)
    {
        $tarefa = Tarefa::findOrFail($id);
        $tags = Tag::all();
        $tarefaUser = $tarefa->user()->get()->toArray();
        $tagTarefa = $tarefa->tag()->get()->toArray();

        return compact('tarefa', 'tags', 'tarefaUser');
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
