<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de usuários') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb4">Olá, <strong>{{ Auth::user()->name }}</strong>!</p>
                </div>

                <div class="p-6 text-gray-900">
                    <div class="p-3 bg-gray-200 rounded-lg mb-4">
                        {{ $users->links() }}
                    </div>
                    <table class="table-auto w-full">
                        <thead class="text-left bg-gray-200">
                            <tr>
                                <th class="text-center">Nível</th>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Data de cadastro</th>
                                @can('level')
                                    <th class="text-center">Ações</th>
                                @endcan
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-gray-200">
                                    <td class="text-center">
                                        @if ($user->level == 'admin')
                                            <i class="fa-solid fa-user-tie"></i>
                                        @elseif ($user->level == 'user')
                                            <i class="fa-solid fa-user"></i>
                                        @endif
                                    </td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at }}</td>
                                    @can('level')
                                        <td class="text-center">
                                            <a href="{{ route('user.edit', $user->id) }}">Editar</a>
                                        </td>
                                    @endcan
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
