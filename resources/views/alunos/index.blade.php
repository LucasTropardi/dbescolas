<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Alunos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}!</strong></p>

                    <div class="p-6 text-gray-900">

                        <div class="bg-gray-100 rounded p-2">{{ $alunos->links() }}</div>
                        <table class="table-auto w-full">
                            <thead class="bg-gray-100 text-left">
                                <tr>
                                    <th class="p-2">Nome</th>
                                    <th class="text-center">Sala</th>
                                    <th class="text-center">Número</th>
                                    <th class="text-center">Usuário</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($alunos as $aluno)
                                    <tr class="hover:bg-gray-200">
                                        <td class="p-2">{{ $aluno->alNome }}</td>
                                        <td class="p-2 text-center">{{ $aluno->alSala }}</td>
                                        <td class="p-2 text-center">{{ $aluno->alNumero }}</td>
                                        <td class="p-2 text-center">{{ $aluno->user->name }}</td>
                                    </tr>

                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
