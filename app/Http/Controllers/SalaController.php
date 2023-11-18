<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\User;
use App\Models\Escola;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SalaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:level')->only('index');
    }

    public function minhas_salas(User $id)
    {
        $user = User::where('id', $id->id)->first();
        $salas = $user->salas()->get();

        return view('salas.minhas_salas',[
            'salas' => $salas
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('salas.index', [
            'salas' => Sala::orderBy('saNome')->paginate('5')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $escolas = Escola::where('user_id', Auth::user()->id)->get();

        return view('salas.create', ['escolas' => $escolas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $sala = new Sala();
        $sala->user_id   = $request->user_id;
        $sala->escola_id = $request->escola_id;
        $sala->saNome    = $request->saNome;
        $sala->saSerie   = $request->saSerie;
        $sala->saTurma   = strtoupper($request->saTurma);
        $sala->saAno     = $request->saAno;

        $sala->save();
        return redirect()->route('minhas.salas', Auth::user()->id)->with('msg','Sala cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sala $sala)
    {
        return view('salas.show',['sala' => $sala]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sala $sala)
    {
        $escolas = Escola::where('user_id', Auth::user()->id)->get();
        return view('salas.edit',[
            'sala' => $sala,
            'escolas' => $escolas
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sala $sala)
    {
        Sala::findOrFail($sala->id)->update($request->all());
        return redirect()->route('sala.show', $sala->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sala $sala)
    {
        Sala::findOrFail($sala->id)->delete();
        return redirect()->route('minhas.salas', Auth::user()->id);
    }

    public function confirma_delete_sala(Sala $id)
    {
        return view('salas.confirma_delete_sala', ['id' => $id]);
    }
}
