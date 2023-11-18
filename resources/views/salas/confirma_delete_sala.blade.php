<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Excluir sala') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}!</strong></p><br>

                    <p class="mb-4">
                        Confirma a exclusão da sala <strong>{{ $id->saNome }}</strong>?<br>
                        Não será possível reverter esta ação.
                    </p>
                    <br>
                    <p>
                        <form action="{{ route('sala.destroy', $id->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <button type="submit" style="color:red;font-weight:800">Excluir <i class="fa-regular fa-circle-check"></i></button>
                            <a href="{{ route('sala.show', $id->id) }}" style="color:blue; margin-left:20px;font-weight:800">Voltar<i class="fa-solid fa-xmark"></i></a>
                        </form>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
