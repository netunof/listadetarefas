@props([
    'tarefas' //array de tarefas
])
<div class="h-96 border boder-gray-100 rounded bg-gray-50 w-64 p-2 overflow-auto">
    <div class="flex justify-between py-1">
        <h3 class="text-xl">Planejando</h3>
    </div>
    <div class="z-0 text-sm mt-2">
        @foreach ($tarefas as $tarefa)
            @if ($tarefa['status'] == 'planejando')
            <button value="{{ $tarefa['id'] }}" class="botInfoTarefa w-full bg-white p-2 rounded mt-1 border-b border-grey hover:bg-gray-100 text-left" draggable="true">
                {{ $tarefa['nome'] }}
            </button>
            @endif
        @endforeach
    </div>
</div>
<div class="h-96 border boder-gray-100 rounded bg-gray-50 w-64 p-2 overflow-auto">
    <div class="flex justify-between py-1">
        <h3 class="text-xl">Executando</h3>
    </div>
    <div class="z-0 text-sm mt-2">
        @foreach ($tarefas as $tarefa)
            @if ($tarefa['status'] == 'executando')
            <button value="{{ $tarefa['id'] }}" class="botInfoTarefa w-full bg-white p-2 rounded mt-1 border-b border-grey hover:bg-gray-100 text-left" draggable="true">
                {{ $tarefa['nome'] }}
            </button>
            @endif
        @endforeach
    </div>
</div>
<div class="h-96 border boder-gray-100 rounded bg-gray-50 w-64 p-2 overflow-auto">
    <div class="flex justify-between py-1">
        <h3 class="text-xl">Concluído</h3>
    </div>
    <div class="z-0 text-sm mt-2">
        @foreach ($tarefas as $tarefa)
            @if ($tarefa['status'] == 'concluido')
            <button value="{{ $tarefa['id'] }}" class="botInfoTarefa w-full bg-white p-2 rounded mt-1 border-b border-grey hover:bg-gray-100 text-left" draggable="true">
                {{ $tarefa['nome'] }}
            </button>
            @endif
        @endforeach
    </div>
</div>
<div class="h-96 border boder-gray-100 rounded bg-gray-50 w-64 p-2 overflow-auto">
    <div class="flex justify-between py-1">
        <h3 class="text-xl">Cancelado</h3>
    </div>
    <div class="z-0 text-sm mt-2">
        @foreach ($tarefas as $tarefa)
            @if ($tarefa['status'] == 'cancelado')
            <button value="{{ $tarefa['id'] }}" class="botInfoTarefa w-full bg-white p-2 rounded mt-1 border-b border-grey hover:bg-gray-100 text-left" draggable="true">
                {{ $tarefa['nome'] }}
            </button>
            @endif
        @endforeach
    </div>
</div>
