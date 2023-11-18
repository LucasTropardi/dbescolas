<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Aluno') }}
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


                    <form action="{{ route('aluno.update', $aluno->id) }}" method="post">
                        @csrf
                        @method('PUT')

                        <fieldset class="border-2 rounded p-6">
                            <h1 class="text-center" style="font-size:25px;font-weight:600;">Editar</h1>

                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="sala_id">Sala</label>
                                <select name="sala_id" id="sala_id" class="w-full rounded" required>
                                    @foreach($salas as $sala)
                                        <option value="{{ $sala->id }}" {{ $aluno->sala_id == $sala->id ? 'selected' : '' }}>
                                            {{ $sala->saNome }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="alNome">Nome</label>
                                <input type="text" name="alNome" id="alNome" value="{{ $aluno->alNome }}" class="w-full rounded" required autofocus>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="alNumero">Numero</label>
                                <input type="text" name="alNumero" id="alNumero" value="{{ $aluno->alNumero }}" class="w-full rounded" pattern="[0-9]" maxlength="1">
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="alResponsavel">Responsável</label>
                                <input type="text" name="alResponsavel" id="alResponsavel" value="{{ $aluno->alResponsavel }}" class="w-full rounded" required>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="alTelefone">Telefone</label>
                                <input type="text" name="alTelefone" id="alTelefone" value="{{ $aluno->alTelefone }}" class="w-full rounded" required>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="alEndereco">Endereço</label>
                                <input type="text" name="alEndereco" id="alEndereco" value="{{ $aluno->alEndereco }}" class="w-full rounded" required>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="alCidade">Cidade</label>
                                <input type="text" name="alCidade" id="alCidade" value="{{ $aluno->alCidade }}" class="w-full rounded" required>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden mb-2">
                                <label for="alObs">Observação</label>
                                <input type="text" name="alObs" id="alObs" value="{{ $aluno->alObs }}" class="w-full rounded" required>
                            </div>

                            <div class="bg-gray-100 p-4 rounded overflow-hidden">
                                <input type="submit" value="Salvar" class="bg-blue-500 text-white rounded p-2">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
