<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\fazenda;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FazendaADMCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fazenda = fazenda::all()->whereNull('delete');
        return view('ADM.FAZENDAS.index', compact('fazenda'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ADM.FAZENDAS.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $validated = $r->validate([
            'name' => 'required',
            'produtor' => 'nullable',
            'inscricao' => 'nullable',
            'local' => 'nullable',
        ]);
        if (fazenda::create($validated)) {
            toast('Cadastrado!', 'success');
            return redirect()->route('fazenda.index');
        };
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fazenda = fazenda::find($id);
        return view('ADM.FAZENDAS.editar', compact('fazenda'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $validated = $r->validate([
            'name' => 'required',
            'produtor' => 'nullable',
            'inscricao' => 'nullable',
            'local' => 'nullable',
        ]);

        if (fazenda::where('id', $id)->update($validated)) {
            toast('Editado com Sucesso!', 'success');
            return redirect()->route('fazenda.index');
        } else {
            toast('Erro ao Editar!', 'error');
            return redirect()->route('fazenda.index');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        fazenda::where('id', $id)->update(['delete' => 1]);
        toast('Deletado com Sucesso!', 'error');
        return redirect()->back();
    }
    // ================================
    public function faz_ativo(Request $r)
    {
        $val = fazenda::find($r->id);
        $dado = $val->ativo > null ? null : 1;
        fazenda::where('id', $r->id)->update(['ativo' => $dado]);
        toast('Realizado com sucesso!', 'info');
        return redirect()->back();
    }
}
