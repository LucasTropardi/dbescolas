<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Sala') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Olá, <strong>{{ Auth::user()->name }}!</strong></p>


                    @if (session('msg'))
                        <p class="bg-blue-500 p-2 rounded text-center text-white mb-4">{{ session('msg') }}</p>
                    @endif


                    <form action="{{ route('sala.store') }}" method="post">
                        @csrf

                        <fieldset class="border-2 rounded p-6">
                            <h1 class="text-center" style="font-size:25px;font-weight:600;">Cadastrar</h1>

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="escola_id">Escola</label>
                                <select name="escola_id" id="escola_id" class="w-full rounded" required>
                                    @foreach($escolas as $escola)
                                        <option value="{{ $escola->id }}">{{ $escola->esNome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="saNome">Nome</label>
                                <input type="text" name="saNome" id="saNome" class="w-full rounded" required autofocus>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="saSerie">Serie</label>
                                <input type="text" name="saSerie" id="saSerie" class="w-full rounded" pattern="[0-9]" maxlength="1">
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="saTurma">Turma</label>
                                <input class="w-full rounded" type="text" name="saTurma" id="saTurma" pattern="[A-Za-z]" maxlength="1" oninput="this.value = this.value.toUpperCase()">

                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="saAno">Ano</label>
                                <input type="text" name="saAno" id="saAno" class="w-full rounded" maxlength="4" required>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden">
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
