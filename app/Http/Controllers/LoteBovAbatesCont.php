<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lotes;
use Illuminate\Http\Request;

class LoteBovAbatesCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        $lote = Lotes::find($id);
        return view('USUARIO.ABATES.cadastrar', compact('lote'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $r->validate([
            'data_abate' =>  'required',
            'peso_saida' => 'required',
        ]);

        if (Lotes::where('id', $id)->update([
            'data_abate' => $r->data_abate,
            'peso_saida' => $r->peso_saida,
            'abatido' => 1
        ])) {
            toast('Abate Realizada!', 'success');
            return redirect()->route('lotes.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
