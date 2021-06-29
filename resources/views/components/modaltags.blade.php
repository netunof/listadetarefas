@props([
    'tags'
])

<div id="modalTags" class="modal fixed z-10 inset-0 overflow-y-auto hidden">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fechar fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity">
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle">
            <div class="bg-white">
                <div class="">
                    <div class="text-center sm:text-left">

                        <h3 class="ml-4 mt-4 mb-4 text-lg leading-6 font-medium text-gray-900">
                            Gerenciamento de tags
                        </h3>
                        <div class="border-t border-gray-200 odd:bg-blue-200">
                            <button id="botNovaTag" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-r">
                                Adicionar uma nova tag
                            </button>
                            <form action="{{ route('tags.store') }}" method="POST" class="hidden grid grid-rows-2 p-5" id="formCreateTag">
                            @csrf
                            {{-- MANIPULAR VIA JQUERY APPEND PRA NÃO RECARREGAR A PÁGINA --}}
                                <input type="text" name="nome" class="rounded border w-full" placeholder="Digite o nome">
                                <div class="grid-cols-1 gap-2 mt-2">
                                    <button type="submit" class="rounded bg-green-500 text-white p-2">Cadastrar</button>
                                    <button type="reset" class="rounded bg-gray-500 text-white p-2">Cancelar</button>
                                </div>
                            </form>
                            <dl>
                                @foreach ($tags as $tag)
                                    <div id="tag{{ $tag['id'] }}" class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                        <form action="{{ route('tags.update', [$tag['id']]) }}" method="POST" class="hidden col-span-2" id="{{'formUpdateTag'.$tag['id']}}">
                                            {{-- MANIPULAR ESTE FORM COM UMA FUNÇÃO ON SUBMIT --}}
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="nome" class="rounded border-gray-500" id="{{'tagInput'.$tag['id']}}" value="{{$tag['nome']}}">
                                            <button type="submit" class="updateTag rounded bg-green-300 text-white p-2" data-value="{{$tag['id']}}">Renomear</button>
                                        </form>
                                        <dt class="text-sm font-medium text-gray-500 py-2" id="{{'tagTitulo'.$tag['id']}}">
                                            {{ $tag['nome'] }}
                                        </dt>
                                        <dd class="mt-1 text-sm sm:mt-0 sm:col-span-1">
                                            <button value="{{$tag['id']}}" class="botEditarTag rounded bg-blue-300 text-white p-2">Modificar</button>
                                            <button value="{{$tag['id']}}" class="botDeleteTag rounded bg-red-700 text-white p-2">Excluir</button>
                                        </dd>
                                    </div>
                                @endforeach
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button class="fechar mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:text-sm">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>
