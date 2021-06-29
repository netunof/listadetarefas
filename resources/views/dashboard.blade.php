<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Painel de gestão') }}
        </h2>
        <div class="flex-1"></div>
        <button id="botModalFiltros" class="border p-1 rounded hover:bg-gray-50">Mostrar filtros</button>
    </x-slot>

    @if($errors->any()){{ implode('', $errors->all('<div>:message</div>')) }}@endif

    <div class="pt-12">
        <div class="mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg relative">
                <button id="botModalTag" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4">
                    Gerenciar tags
                </button>
                <button id="botModalLixeira" class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4">
                    Lixeira
                </button>
                <div class="overflow-x-auto grid grid-rows-1 grid-flow-col gap-4 p-6 bg-white border-b border-gray-200">
                    <x-quadro :tarefas=$tarefas class="grid grid-cols-5"/>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<!-- Modais da página-->
<x-modaladd :users="$users" :tags="$tags"/>
<x-modaledit :users="$users" :tags="$tags"/>
{{-- a ser implementado --}}
<x-modalfiltros :users="$users" :tags="$tags"/>
<x-modalinfo idTarefa="$idTarefa" nome="$nome" user="$user" tags="$tags"/>
<x-modaltags :tags="$tags"/>
<x-modallixeira :apagados="$apagados"/>
<!-- Fim da seção de modais-->
