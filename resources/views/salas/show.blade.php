<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes da sala') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}!</strong></p>

                    <p class="mb-2">
                        Exibindo detalhes da sala {{ $sala->saNome }}
                    </p>


                    <div class="p-6 text-gray-900">
                        <p><strong>Nome: </strong>{{ $sala->saNome }}</p>
                        <p><strong>Série: </strong>{{ $sala->saSerie }}</p>
                        <p><strong>Turma: </strong>{{ $sala->saTurma }}</p>
                        <p><strong>Ano: </strong>{{ $sala->saAno }}</p>
                        <p><strong>Escola: </strong>{{ $sala->escola->esNome }}</p>
                    </div>
                    <p class="p-2">
                        <a href="{{ route('minhas.salas', Auth::user()->id) }}" class="bg-blue-500 text-white rounded p-2">Voltar</a>
                        <a href="{{ route('sala.edit', $sala->id) }}" class="bg-gray-500 text-white rounded p-2">Editar</a>
                        <a href="{{ route('confirma.delete.sala',$sala->id) }}" class="bg-red-500 text-white rounded p-2">Excluir</a></p><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
