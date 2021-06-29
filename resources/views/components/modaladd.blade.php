@props([
    'users',
    'tags'
])

<div id="modalAdd" class="modal fixed z-10 inset-0 overflow-y-auto invisible" aria-labelledby="modalCadastroTarefa" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div  class="fechar fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="invisible sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left" id="modalCadastroTarefa">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            Criar nova tarefa
                        </h3>
                        <form action="{{ route('tarefas.store') }}" method="POST">
                            @csrf
                            <div class="mb-6">
                                <label for="nome" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Nome do tarefa</label>
                                <input type="text" name="nome" id="nome" placeholder="Nome do tarefa" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                            </div>

                            <div class="mb-6">
                                <label for="descricao" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Descrição</label>
                                <input type="text" name="descricao" id="descricao" placeholder="Descrição" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                            </div>

                            <div class="mb-6">
                                <label for="valor" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Valor</label>
                                <input step=".01" type="number" name="valor" id="valor" placeholder="Valor" required class="w-full px-3 py-2 placeholder-gray-300 border border-gray-300 rounded-md focus:outline-none focus:ring focus:ring-indigo-100 focus:border-indigo-300 dark:bg-gray-700 dark:text-white dark:placeholder-gray-500 dark:border-gray-600 dark:focus:ring-gray-900 dark:focus:border-gray-500" />
                            </div>

                            <div class="mb-6">
                                <span class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Usuários responsáveis</span>
                                @foreach ($users as $user)
                                <div class="inline-flex" id="{{'labelUser'.$user['id']}}">
                                        <label class="items-center mt-3">
                                            <input type="checkbox" class="form-checkbox h-5 w-5 text-yellow-600" name='users[]' value="{{ $user['id'] }}"><span class="ml-2 text-gray-700">{{ $user['name'] }}</span>
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <span class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Tags</span>
                            @foreach ($tags as $tag)
                            <div class="inline-flex" id="{{"labelTag".$tag['id']}}">
                                <label class="items-center mt-3">
                                    <input type="checkbox" class="form-checkbox h-5 w-5 text-yellow-600" name='tags[]' value="{{ $tag['id'] }}"><span class="ml-2 text-gray-700">{{ $tag['nome'] }}</span>
                                </label>
                            </div>
                            @endforeach

                            <input type="hidden" name="lista_id" id="listaid"/>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Inserir
                    </button>
                    <button class="fechar" type="reset" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancelar
                    </button>
                </div>
                        </form>
        </div>
    </div>
</div>
