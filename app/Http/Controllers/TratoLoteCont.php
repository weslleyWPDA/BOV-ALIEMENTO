<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lotes;
use App\Models\trato_diario;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TratoLoteCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $r)
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $r)
    {
        $lote = Lotes::find($r->id);
        $user_id = Auth::user()->id;
        $data = Carbon::now()->format('Y-m-d');
        $fazenda_id = Auth::user()->fazenda_id;
        return view('USUARIO.TRATODIA.cadastrar', compact('lote', 'user_id', 'fazenda_id', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $r['fazenda_id'] = Auth::user()->fazenda_id;
        $r['user_id'] = Auth::user()->id;

        $validated = $r->validate([
            'total_trato' =>  'required',
            'categoria_produto' => 'required',
            'data' => 'required',
            'fazenda_id' => 'required',
            'lote_id' => 'required',
            'user_id' => 'required',
        ]);
        if (trato_diario::create($validated)) {
            toast('Cadastrado!', 'success');
            return redirect()->route('trato.show', $r->lote_id);
        };
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $lote = Lotes::find($id);
        $trato = trato_diario::all()->whereNull('delete');
        return view('USUARIO.TRATODIA.index', compact('lote', 'trato'));
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
        //
    }
}
