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
        ]);

        Fan::create($validated);

        return redirect()->route('home')->with('success', 'Cadastro realizado com sucesso!');

    }

    public function show(Fan $fan)
    {
        return $fan;
    }

    public function update(Request $request, Fan $fan)
    {
        $fan->update($request->all());
        return $fan;
    }

    public function destroy(Fan $fan)
    {
        $fan->delete();
        return response()->noContent();
    }
}
