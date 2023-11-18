<?php

namespace App\Http\Controllers;

use App\Models\Escola;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EscolaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:level')->only('index');
    }

    public function minhas_escolas(User $id)
    {
        $user = User::where('id', $id->id)->first();
        $escolas = $user->schools()->get();

        return view('escolas.minhas_escolas',[
            'escolas' => $escolas
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('escolas.index', [
            'escolas' => Escola::orderBy('esNome')->paginate('5')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('escolas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $escola = new Escola();
        $escola->user_id    = $request->user_id;
        $escola->esNome     = $request->esNome;
        $escola->esTelefone = $request->esTelefone;
        $escola->esEndereco = $request->esEndereco;
        $escola->esCidade   = $request->esCidade;
        $escola->esObs      = $request->esObs;

        $escola->save();
        return redirect()->route('minhas.escolas', Auth::user()->id)->with('msg','Escola cadastrada com sucesso.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Escola $escola)
    {
        return view('escolas.show',['escola' => $escola]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Escola $escola)
    {
        return view('escolas.edit',['escola' => $escola]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Escola $escola)
    {
        Escola::findOrFail($escola->id)->update($request->all());
        return redirect()->route('escola.show', $escola->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Escola $escola)
    {
        Escola::findOrFail($escola->id)->delete();
        return redirect()->route('minhas.escolas', Auth::user()->id);
    }

    public function confirma_delete(Escola $id)
    {
        return view('escolas.confirma_delete', ['id' => $id]);
    }
}
