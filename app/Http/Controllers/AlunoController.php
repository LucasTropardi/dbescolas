<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use App\Http\Controllers\Controller;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlunoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:level')->only('index');
    }

    public function meus_alunos(User $id)
{
        $user = User::where('id', $id->id)->first();
        $alunos = $user->alunos()->with('sala')->get();

        return view('alunos.meus_alunos', [
            'alunos' => $alunos,
    ]);
}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('alunos.index', [
            'alunos' => Aluno::orderBy('alNome')->paginate('10')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $salas = Sala::where('user_id', Auth::user()->id)->get();

        return view('alunos.create', ['salas' => $salas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $aluno = new Aluno();
        $aluno->user_id         = $request->user_id;
        $aluno->sala_id         = $request->sala_id;
        $aluno->alNome          = $request->alNome;
        $aluno->alNumero        = $request->alNumero;
        $aluno->alResponsavel   = $request->alResponsavel;
        $aluno->alTelefone      = $request->alTelefone;
        $aluno->alEndereco      = $request->alEndereco;
        $aluno->alCidade        = $request->alCidade;
        $aluno->alObs           = $request->alObs;

        $aluno->save();
        return redirect()->route('meus.alunos', Auth::user()->id)->with('msg','Aluno cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aluno $aluno)
    {
        return view('alunos.show',['aluno' => $aluno]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aluno $aluno)
    {
        $salas = Sala::where('user_id', Auth::user()->id)->get();
;
        return view('alunos.edit',[
            'aluno' => $aluno,
            'salas' => $salas,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aluno $aluno)
    {
        Aluno::findOrFail($aluno->id)->update($request->all());
        return redirect()->route('aluno.show', $aluno->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aluno $aluno)
    {
        Aluno::findOrFail($aluno->id)->delete();
        return redirect()->route('meus.alunos', Auth::user()->id);
    }

    public function confirma_delete_aluno(Sala $id)
    {
        return view('alunos.confirma_delete_aluno', ['id' => $id]);
    }
}
