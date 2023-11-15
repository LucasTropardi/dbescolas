<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Escola') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}!</strong></p>

                    <p class="mb-4 p-6">
                        <a href="{{ route('minhas.escolas', Auth::user()->id) }}" class="bg-blue-500 text-white rounded p-2">Minhas escolas</a>
                    </p>

                    @if (session('msg'))
                        <p class="bg-blue-500 p-2 rounded text-center text-white mb-4">{{ session('msg') }}</p>
                    @endif


                    <form action="{{ route('escola.store') }}" method="post">
                        @csrf

                        <fieldset class="border-2 rounded p-6">
                            <h1 class="text-center" style="font-size:25px;font-weight:600;">Cadastrar</h1>

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="bg-gray-200 p-4 rounded overflow-hidden mb-2">
                                <label for="esNome">Nome</label>
                                <input type="text" name="esNome" id="esNome" class="w-full rounded" required autofocus>
                            </div>

                            <div class="bg-gray-200 p-4 rounded overflow-hidden mb-2">
                                <label for="esTelefone">Telefone</label>
                                <input type="tel" name="esTelefone" id="esTelefone" class="w-full rounded">
                            </div>

                            <div class="bg-gray-200 p-4 rounded overflow-hidden mb-2">
                                <label for="esEndereco">Endereço</label>
                                <input type="text" name="esEndereco" id="esEndereco" class="w-full rounded">
                            </div>

                            <div class="bg-gray-200 p-4 rounded overflow-hidden mb-2">
                                <label for="esCidade">Cidade</label>
                                <input type="text" name="esCidade" id="esCidade" class="w-full rounded" required>
                            </div>

                            <div class="bg-gray-200 p-4 rounded overflow-hidden mb-2">
                                <label for="esObs">Observação</label>
                                <input type="text" name="esObs" id="esObs" class="w-full rounded" >
                            </div>

                            <div class="bg-gray-200 p-4 rounded overflow-hidden">
                                <input type="submit" value="Salvar" class="bg-blue-500 text-white rounded p-2">
                                <input type="reset" value="Limpar" class="bg-red-500 text-white rounded p-2">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
