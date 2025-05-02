<?php

namespace App\Http\Controllers;

use App\Models\Fan;
use Illuminate\Http\Request;

class FanController extends Controller
{
    public function index(Request $request)
    {
        // Buscando os fãs com base nos filtros
        $fans = Fan::query();

        if ($request->has('name') && $request->name != '') {
            $fans->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('favorite_sport') && $request->favorite_sport != '') {
            $fans->where('favorite_sport', 'like', '%' . $request->favorite_sport . '%');
        }

        if ($request->has('favorite_player') && $request->favorite_player != '') {
            $fans->where('favorite_player', 'like', '%' . $request->favorite_player . '%');
        }

        $fans = $fans->get();// Busca todos os fãs cadastrados

        return view('dashboard', compact('fans'));
    }

    public function create()
    {
        return view('fan_register');
    }

    public function store(Request $request)
    {
        // var_dump($request); // Imprime os dados recebidos no controlador
        $validated = $request->validate([
            'name' => 'required|string',
            'cpf' => 'required|string|unique:fans',
            'email' => 'required|email|unique:fans',
            'favorite_sport' => 'nullable|string',
            'favorite_player' => 'nullable|string',
            'birth_date' => 'required|date',
            'endereco' =>  'required|string',
            'cidade' => 'required|string',
            'estado' => 'required|string',
            'numero' => 'required|string',
            'instagram' => 'required|string',
            'twitter' => 'required|string',
        ]);

        Fan::create($validated);

        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso!');

    }

    public function show(Fan $fan)
    {
        return $fan;
    }

    public function edit($id)
{
    $fan = Fan::findOrFail($id);
    return view('fan_edit', compact('fan'));
}


public function update(Request $request, $id)
{
    $fan = Fan::findOrFail($id);
    $fan->update($request->all());

    return redirect()->route('dashboard')->with('success', 'Fã atualizado com sucesso!');
}

public function destroy($id)
{
    $fan = Fan::findOrFail($id);
    $fan->delete();

    return redirect()->route('dashboard')->with('success', 'Fã deletado com sucesso!');
}

}
