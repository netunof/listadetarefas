@props([
    'tarefas' //array de tarefas
])
<div class="h-96 border boder-gray-100 rounded bg-gray-50 w-64 p-2 overflow-auto">
    <div class="flex justify-between py-1">
        <h3 class="text-xl">Asseio</h3>
    </div>
    <div class="z-0 text-sm mt-2">
        @foreach ($tarefas as $tarefa)
            <button value="{{ $tarefa['id'] }}" class="botInfoTarefa w-full bg-white p-2 rounded mt-1 border-b border-grey hover:bg-gray-100 text-left" draggable="true">
                {{ $tarefa['nome'] }}
            </button>
        @endforeach
    </div>
</div>
<div class="h-96 border boder-gray-100 rounded bg-gray-50 w-64 p-2 overflow-auto">
    <div class="flex justify-between py-1">
        <h3 class="text-xl">Cozinha</h3>
    </div>
    <div class="z-0 text-sm mt-2">
        @foreach ($tarefas as $tarefa)
            <button value="{{ $tarefa['id'] }}" class="botInfoTarefa w-full bg-white p-2 rounded mt-1 border-b border-grey hover:bg-gray-100 text-left" draggable="true">
                {{ $tarefa['nome'] }}
            </button>
        @endforeach
    </div>
</div>
<div class="h-96 border boder-gray-100 rounded bg-gray-50 w-64 p-2 overflow-auto">
    <div class="flex justify-between py-1">
        <h3 class="text-xl">Estudo</h3>
    </div>
    <div class="z-0 text-sm mt-2">
        @foreach ($tarefas as $tarefa)
            <button value="{{ $tarefa['id'] }}" class="botInfoTarefa w-full bg-white p-2 rounded mt-1 border-b border-grey hover:bg-gray-100 text-left" draggable="true">
                {{ $tarefa['nome'] }}
            </button>
        @endforeach
    </div>
</div>
<div class="h-96 border boder-gray-100 rounded bg-gray-50 w-64 p-2 overflow-auto">
    <div class="flex justify-between py-1">
        <h3 class="text-xl">Exercício</h3>
    </div>
    <div class="z-0 text-sm mt-2">
        @foreach ($tarefas as $tarefa)
            <button value="{{ $tarefa['id'] }}" class="botInfoTarefa w-full bg-white p-2 rounded mt-1 border-b border-grey hover:bg-gray-100 text-left" draggable="true">
                {{ $tarefa['nome'] }}
            </button>
        @endforeach
    </div>
</div>
<div class="h-96 border boder-gray-100 rounded bg-gray-50 w-64 p-2 overflow-auto">
    <div class="flex justify-between py-1">
        <h3 class="text-xl">Faxina</h3>
    </div>
    <div class="z-0 text-sm mt-2">
        @foreach ($tarefas as $tarefa)
            <button value="{{ $tarefa['id'] }}" class="botInfoTarefa w-full bg-white p-2 rounded mt-1 border-b border-grey hover:bg-gray-100 text-left" draggable="true">
                {{ $tarefa['nome'] }}
            </button>
        @endforeach
    </div>
</div>
<div class="h-96 border boder-gray-100 rounded bg-gray-50 w-64 p-2 overflow-auto">
    <div class="flex justify-between py-1">
        <h3 class="text-xl">Trabalho</h3>
    </div>
    <div class="z-0 text-sm mt-2">
        @foreach ($tarefas as $tarefa)
            <button value="{{ $tarefa['id'] }}" class="botInfoTarefa w-full bg-white p-2 rounded mt-1 border-b border-grey hover:bg-gray-100 text-left" draggable="true">
                {{ $tarefa['nome'] }}
            </button>
        @endforeach
    </div>
</div>
