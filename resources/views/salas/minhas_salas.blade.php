<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Minhas salas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-2">Olá, <strong>{{ Auth::user()->name }}!</strong></p>

                    <div class="p-6 text-gray-900">
                        <p class="mb-4 p-1">
                            <a href="{{ route('sala.create') }}" class="bg-blue-500 text-white rounded p-2">Nova sala</a>
                        </p>
                        <table class="table-auto w-full">
                            <thead class="bg-gray-200 text-left">
                                <tr>
                                    <th class="p-2">Nome</th>
                                    <th class="text-center">Serie</th>
                                    <th class="text-center">Turma</th>
                                    <th class="text-center">Escola</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($salas as $sala)
                                    <tr class="hover:bg-gray-200">
                                        <td class="p-2">{{ $sala->saNome }}</td>
                                        <td class="text-center">{{ $sala->saSerie }}</td>
                                        <td class="text-center">{{ $sala->saTurma }}</td>
                                        <td class="text-center">{{ $sala->escola->esNome }}</td>
                                        <td class="p-2 text-center"><a href="{{ route('sala.show', $sala->id) }}"><i class="fa-solid fa-circle-info"></i></a></td>
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
