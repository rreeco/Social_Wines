<?php

namespace App\Http\Controllers;

use App\Models\Macchina;
use Illuminate\Http\Request;

class MacchinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $macchina = Macchina::all();
        return view('macchina.index', compact('macchina'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('macchina.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate ([
            'marca' => 'required',
            'modello' => 'required',
            'immatricolazione' => 'required',
            'isUsato' => 'required',
            'prezzo' => 'required',
            'rivenditori' => 'required',
            'ricambi' => 'required',
        ]);

        Macchina::create($request -> all());

        return redirect() ->route('macchina.index')
                          -> with('success', 'Macchina inserita correttamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Macchina $macchina)
    {
        $macchina = Macchina::findOrFail($id);
        return view('macchina.edit', compact('macchina'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Macchina $macchina)
    {
        $macchina = Macchina::findOrFail($id);
        return view('macchina.edit', compact('macchina'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Macchina $macchina)
    {
        $request->validate ([
            'marca' => 'required',
            'modello' => 'required',
            'immatricolazione' => 'required',
            'isUsato' => 'required',
            'prezzo' => 'required',
            'rivenditori' => 'required',
            'ricambi' => 'required',
        ]);

        $macchina = Macchina::findOrFail($id);
        $macchina -> update($request -> all());

        return redirect() -> route('macchina.index')
                          -> with ('success', 'Macchina aggiornata con successo');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Macchina $macchina)
    {
        $macchina = Macchina::findOrFail($id);
        $macchina -> delete();

        return redirect() -> route('macchina.index')
                          -> with ('success', 'Macchina eliminata con successo');
    }
}
