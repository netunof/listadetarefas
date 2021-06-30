@props([
    'idTarefa',
    'nome',
    'descricao'
])

<div id="modalInfo" class="modal fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modalInfo" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div class="fechar fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true">
        </div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div
            class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white">
                <div class="sm:flex sm:items-start">
                    <div class="text-center sm:text-left">

                        <h3 class="ml-4 mt-4 mb-4 text-lg leading-6 font-medium text-gray-900">
                            Informações da tarefa
                        </h3>

                        <div class="border-t border-gray-200">
                            <dl>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Nome do tarefa
                                    </dt>
                                    <dd id="nomeTarefa" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"></dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Descrição
                                    </dt>
                                    <dd id="descricaoTarefa" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"></dd>
                                </div>
                                <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Usuário responsável
                                    </dt>
                                    <dd id="usersTarefa" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2"></dd>
                                </div>
                                <div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                    <dt class="text-sm font-medium text-gray-500">
                                        Tags
                                    </dt>
                                    <dd id="tagsTarefa" class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                        {{-- aqui são listados os tags da tarefa --}}
                                    </dd>
                                </div>

                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button class="fechar mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:text-sm">
                    Fechar
                </button>
                <button id="btnEditar" value=""
                    class="border border-transparent bg-blue-700 rounded-md text-white px-4 py-2 ml-3">
                    Alterar
                </button>
                <button id="apagarTarefa" value=""
                    class="border border-transparent bg-red-700 rounded-md text-white px-4 py-2">
                    Apagar
                </button>
            </div>
        </div>
    </div>
</div>
