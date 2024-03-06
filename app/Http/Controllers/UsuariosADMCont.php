<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\fazenda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsuariosADMCont extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::all()->whereNull('delete');
        return view('ADM.USUARIOS.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fazenda = fazenda::all()->whereNull('delete')->whereNull('ativo');
        return view('ADM.USUARIOS.cadastrar', compact('fazenda'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $r)
    {
        $validated = $r->validate([
            'name' => ['required', Rule::unique('users')->whereNull('delete')],
            'password' => 'required',
            'fazenda_id' => 'required',
            'admin' => 'nullable',
        ], [
            "name.unique" => "Usuario já existente!",
        ]);
        if (User::create($validated)) {
            toast('Cadastrado!', 'success');
            return redirect()->route('usuario.index');
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
        $usuario = User::find($id);
        $fazenda = fazenda::all()->whereNull('delete')->whereNull('ativo');
        return view('ADM.USUARIOS.editar', compact('fazenda', 'usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $r, string $id)
    {
        $r->validate([
            'name' => ['required', Rule::unique('users')->whereNull('delete')->ignore($id)],
            'password' => 'required',
            'fazenda_id' => 'required',
            'admin' => 'nullable',
        ], [
            "name.unique" => "Usuario já existente!",
            "name.required" => "Usuario vazio!",
        ]);

        if (User::where('id', $id)->update([
            'name' => $r->name, 'password' => Hash::make($r->password),
            'fazenda_id' => $r->fazenda_id, 'admin' =>  $r->admin,
        ])) {
            toast('Editado com Sucesso!', 'success');
            return redirect()->route('usuario.index');
        } else {
            toast('Erro ao Editar!', 'error');
            return redirect()->route('usuario.index');
        };
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::where('id', $id)->update(['delete' => 1]);
        toast('Deletado com Sucesso!', 'error');
        return redirect()->back();
    }
    // ================================
    public function user_ativo(Request $r)
    {
        $val = User::find($r->id);
        $dado = $val->ativo > null ? null : 1;
        User::where('id', $r->id)->update(['ativo' => $dado]);
        toast('Realizado com sucesso!', 'info');
        return redirect()->back();
    }
}
