<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoteBovCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lotes = Lotes::all()->whereNull('delete')->whereNull('abatido');
        return view('USUARIO.LOTES.index', compact('lotes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('USUARIO.LOTES.cadastrar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $r['fazenda_id'] = Auth::user()->fazenda_id;
        $validated = $r->validate([
            'pasto' =>  'required',
            'area_pasto' => 'required',
            'quant_cabeca' => 'required',
            'categoria_bov' => 'required',
            'gmd' => 'required',
            'peso_entrada' => 'required',
            'data_entrada' => 'required',
            'quant_dias' => 'required',
            'tipo_capim' => 'required',
            'fazenda_id' => 'required',
        ]);
        if (Lotes::create($validated)) {
            toast('Cadastrado!', 'success');
            return redirect()->route('lotes.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Lotes::where('id', $id)->update(['delete' => 1]);
        toast('Deletado com Sucesso!', 'error');
        return redirect()->back();
    }
}
