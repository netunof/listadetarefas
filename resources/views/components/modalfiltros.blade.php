@props([
    'users',
    'tags'
])

<div id="modalfiltrosbox" class="modal fixed z-10 inset-0 overflow-y-auto hidden" aria-labelledby="modalFiltros" role="dialog" aria-modal="true">
    <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
        <div id="modalfiltrosbg" class="fechar fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <form action="#">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="sm:flex sm:items-start">
                        <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                            <h3 class="text-xl">Filtros de pesquisa</h3>
                            <h3 class="my-3 text-lg w-full text-gray-500">Users responsáveis</h3>
                            <div class="grid grid-cols-3 gap-4 items-center justify-center w-full mb-3">
                                    @foreach ($users as $user)
                                    <!-- Toggle Button -->
                                    <label for="{{'user'.$user['id']}}" class="flex items-center cursor-pointer">
                                        <!-- toggle -->
                                        <div class="relative">
                                            <!-- input -->
                                            <input id="{{'user'.$user['id']}}" value="{{$user['id']}}" type="checkbox" name="user[]" class="hidden"/>
                                            <!-- line -->
                                            <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                            <!-- dot -->
                                            <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"></div>
                                        </div>
                                        <!-- label -->
                                        <div class="ml-3 text-gray-700 font-medium">
                                            {{$user['name']}}
                                        </div>
                                    </label>
                                    @endforeach
                                </select>
                            </div>
                            <h3 class="my-3 text-lg w-full text-gray-500">Órgãos tramitados</h3>
                            <div class="grid grid-cols-3 gap-4 items-center justify-center w-full mb-3">
                                @foreach ($tags as $tag)
                                <!-- Toggle Button -->
                                <label for="{{'tag'.$tag['id']}}" class="flex items-center cursor-pointer">
                                    <!-- toggle -->
                                    <div class="relative">
                                        <!-- input -->
                                        <input id="{{'tag'.$tag['id']}}" value="{{$tag['id']}}" type="checkbox" name="tag[]" class="hidden"/>
                                        <!-- line -->
                                        <div class="toggle__line w-10 h-4 bg-gray-400 rounded-full shadow-inner"></div>
                                        <!-- dot -->
                                        <div class="toggle__dot absolute w-6 h-6 bg-white rounded-full shadow inset-y-0 left-0"></div>
                                    </div>
                                    <!-- label -->
                                    <div class="ml-3 text-gray-700 font-medium overflow-auto">
                                        {{$tag['nome']}}
                                    </div>
                                </label>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-yellow-500 text-base font-medium text-white hover:bg-yellow-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500 sm:ml-3 sm:w-auto sm:text-sm">
                        Aplicar
                    </button>
                    <button type="reset"
                        class="fechar mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
.toggle__dot {
  top: -.25rem;
  left: -.25rem;
  transition: all 0.3s ease-in-out;
}
input:checked ~ .toggle__dot {
  transform: translateX(100%);
  background-color: #f59f0b;
}
</style>
