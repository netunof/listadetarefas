@props([
    'apagados'
])

<div id="modalLixeira" class="modal fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modalLixeira" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fechar fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle">
            <div class="bg-white">
                <div class="text-center sm:text-left">
                    <h3 class="ml-4 mt-4 mb-4 text-lg leading-6 font-medium text-gray-900">
                        Lixeira
                    </h3>
                    <div class="border-t border-gray-200 odd:bg-blue-200">
                        <dl>
                            @forelse ($apagados as $apagado)
                                <div id="lixo{{ $apagado['id'] }}" class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500 py-2">
                                        {{ $apagado['nome'] }}
                                    </dt>
                                    <dd class="mt-1 text-sm sm:mt-0 sm:col-span-2">
                                        <button id="{{'botRestaurarTarefa'.$apagado['id']}}" value="{{$apagado['id']}}" class="botRestaurarTarefa rounded bg-blue-300 text-white p-2">Restaurar</button>
                                        <button id="{{'botEliminarTarefa'.$apagado['id']}}" value="{{$apagado['id']}}" class="botEliminarTarefa rounded bg-red-700 text-white p-2">Excluir</button>
                                    </dd>
                                </div>
                            @empty
                                <div class="px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    Lixeira vazia
                                </div>
                            @endforelse
                        </dl>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button"
                    class="fechar mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:text-sm">
                    Fechar
                </button>
            </div>
        </div>
    </div>
</div>
