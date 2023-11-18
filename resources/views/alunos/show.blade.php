<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalhes do aluno') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}!</strong></p>

                    <p class="mb-2">
                        Exibindo detalhes do aluno {{ $aluno->alNome }}
                    </p>


                    <div class="p-6 text-gray-900">
                        <p><strong>Nome: </strong>{{ $aluno->saNome }}</p>
                        <p><strong>Sala: </strong>{{ $aluno->sala->saNome }}</p>
                        <p><strong>Número: </strong>{{ $aluno->alNumero }}</p>
                        <p><strong>Responsável: </strong>{{ $aluno->alResponsavel }}</p>
                        <p><strong>Telefone: </strong>{{ $aluno->alTelefone }}</p>
                        <p><strong>Endereço: </strong>{{ $aluno->alEndereco }}</p>
                        <p><strong>Cidade: </strong>{{ $aluno->alCidade }}</p>
                        <p><strong>Observação: </strong>{{ $aluno->alObs }}</p>
                    </div>
                    <p class="p-2">
                        <a href="{{ route('meus.alunos', Auth::user()->id) }}" class="bg-blue-500 text-white rounded p-2">Voltar</a>
                        <a href="{{ route('aluno.edit', $aluno->id) }}" class="bg-gray-500 text-white rounded p-2">Editar</a>
                        <a href="{{ route('confirma.delete.aluno',$aluno->id) }}" class="bg-red-500 text-white rounded p-2">Excluir</a></p><br>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
